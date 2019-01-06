# TeansServer
a server for transmit messages between IOT devices ,it has a easy transmission protocol.
# How to use

## transmission protrol 传输协议
```
{
    "ori":{                         //origin      源头
        "id":"MAX:20",             //device_id   设备ID
        "type":"XXX",               //device_type 设备类型
        "prot":"tcp/ws/heartbeat"   //protrol     协议
    },
    "obj":{                         //object      目标
        "id":"MAX:20",             //device_id   设备ID
        "type":"XXX",               //device_type 设备类型
        "prot":"tcp/ws/heartbeat"   //protrol     协议
    },
    "data":{                        //data        数据
        "hello":"world"
    }
}
```

# How to connect  如何使用
tcp =>  47.75.194.9:8282

ws  =>  47.75.194.9:8383

# For Example  示例
## step 1:regist device 注册设备
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
## step 2:send message 发送信息
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
# Contact me
lqs429521992@qq.com
