一、	安装环境
    1.	Linux系统
    2.	PHP版本>= 5.5.3		通过在控制台执行该命令检测
    3.	检测是否可以搭建服务器:
	通过在控制台(ctrl+alt+t)执行该命令检测:curl –Ss http://www.workerman.net/check.php | php
	错误请安装pcntl或posix扩展
二、	启动服务
    1.	进入目录
    2.	启动服务 nohup sh start.sh &