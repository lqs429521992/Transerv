<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * 用于检测业务代码死循环或者长时间阻塞等问题
 * 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
 * 然后观察一段时间workerman.log看是否有process_timeout异常
 */
//declare(ticks=1);
use \GatewayWorker\Lib\Gateway;
use Workerman\Connection\AsyncTcpConnection;
use Workerman\Connection\MysqlConnection;
/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 */
class Events
{
    public static $mysql_conn = null;
    public static function getConnection(){
        if (self::$mysql_conn instanceof MysqlConnection) {
            return self::$mysql_conn;
        }
        self::$mysql_conn=new MysqlConnection('127.0.0.1',
            '3306',
            'nodemcu',
            'lqs4568349',
            'nodemcu');
        echo "[".date("Y/m/d H:i:s")."]    『TcpServ』 已建立数据库连接!\n";
        return self::$mysql_conn;
    }

    public static function onConnect($client_id){
        echo "设备$client_id 连接\n";
    }
    public static function onMessage($client_id, $message){
        echo "[".date("Y/m/d H:i:s")."]    『TcpServ』 接收消息: ".$message."\n";
        $msgarr=json_decode($message,true);
        if (empty($msgarr)||!isset($msgarr['obj']['type'])||!isset($msgarr['obj']['prot']))
            return;
        if ($msgarr['obj']['prot']=='heartbeat') {
            $sql="INSERT INTO tb_tcp (user_id,net_id)".
                "VALUES('".$msgarr['ori']['id']."','".$client_id."')".
                "ON DUPLICATE KEY UPDATE net_id='".$client_id."'";
            self::getConnection()->query($sql);
            return;
        }
        if ($msgarr['obj']['prot']=='tcp') {
            $sql="SELECT net_id FROM tb_tcp ".
                "WHERE user_id='".$msgarr['obj']['id']."'";
            $result=self::getConnection()->query($sql);
            Gateway::sendToClient($result[0]['net_id'],$message);
            return;
        }
        if ($msgarr['obj']['prot']=='ws') {
            try {
                $tcp_conn = new AsyncTcpConnection('ws://127.0.0.1:8383');
                $tcp_conn->connect();
                $tcp_conn->send($message);
                $tcp_conn->close();
            } catch (Exception $e) {
            }
            return;
        }
    }
    public static function onClose($client_id){
        $sql="DELETE from tb_tcp WHERE net_id ='".$client_id."' ";
        self::getConnection()->query($sql);
        echo $client_id."已退出\n";
    }
}