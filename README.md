# TeansServer
a server for transmit messages between IOT devices ,it has a easy transmission protocol.
# How to use

## transmission protrol 传输协议
```
{
    "ori":{                       //origin      源头
        "id":"XXXXXXX",           //device_id   设备ID
        "type":"XXX",             //device_type 设备类型
        "prot":"tcp/ws/heartbeat" //protrol     协议
    },
    "obj":{                       //object      目标
        "id":"XXXXXXX",           //device_id   设备ID
        "type":"XXX",             //device_type 设备类型
        "prot":"tcp/ws/heartbeat" //protrol     协议
    },
    "data":{                      //data        数据
        "hello":"world"
    }
}
```

# How to connect
tcp =>  47.75.194.9:8282

ws =>  47.75.194.9:8383

# For Example
## step 1:connect to server
## step 2:regist your device
## step 3:send message
