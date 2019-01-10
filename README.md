# TransServer
a server for transmit messages between IOT devices ,it has a easier transmission protocol.

用于在IOT设备之间传输消息的服务器，它具有较简单的传输协议。

本项目基于GatewayWorker开发 项目地址： https://github.com/walkor/GatewayWorker

当前版本为Mysql版，redis版本正在编写，欢迎提出问题以便更好地服务大家。
redis版暂不开发，如您有需求，烦请根据Mysql原理使用PHP-redis 扩展 保存设备连接信息
# How to use 如何使用

## transmission protrol 传输协议
```
{
    "ori":{                         //origin      源头
        "id":"MAX:17",              //device_id   设备ID
        "type":"XXX",               //device_type 设备类型
        "prot":"tcp/ws/heartbeat"   //protrol     协议
    },
    "obj":{                         //object      目标
        "id":"MAX:17",              //device_id   设备ID
        "type":"XXX",               //device_type 设备类型
        "prot":"tcp/ws/heartbeat"   //protrol     协议
    },
    "data":{                        //data        数据
        "hello":"world"
    }
}
```
注:

1.id 最大17位取决于数据库设计

2.tcp与ws间延迟约为1s

3.试用服务器并发约为1500(单核)

# How to connect  如何连接
Tcp:
xn--55qy30c09ad7hkw0e.online:8282

Ws:
xn--55qy30c09ad7hkw0e.online:8383

# For Example  示例
## step 1:  regist device 注册设备
```
{
    "ori":{                         //origin      源头
        "id":"sensor_id",           //device_id   设备ID
        "type":"sensor",            //device_type 设备类型
        "prot":"tcp"                //protrol     协议
    },
    "obj":{                         //object      目标
        "id":"server",              //device_id   设备ID
        "type":"server",            //device_type 设备类型
        "prot":"heartbeat"          //protrol     协议
    },
    "data":{                        //data        数据
    }
}
```
## step 2:  send message 发送信息
```
{
    "ori":{                         //origin      源头
        "id":"sensor_id",           //device_id   设备ID
        "type":"sensor",            //device_type 设备类型
        "prot":"tcp"                //protrol     协议
    },
    "obj":{                         //object      目标
        "id":"object_id",           //device_id   设备ID
        "type":"phone",             //device_type 设备类型
        "prot":"ws"                 //protrol     协议
    },
    "data":{                        //data        数据
        "alive":"true"
    }
}
```
# How to deploy  如何部署
step 1: execute sql file 执行SQL文件

step 2: open port 开放端口

step 3: Download project 下载项目

step 4: enter directory 进入目录

step 5: execute `nohup sh start.sh &` 执行 `nohup sh start.sh &`

# Contact me
lqs429521992@qq.com

