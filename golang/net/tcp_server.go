package main

import (
    "io"
    "log"
    "net"
)

func func main() {
    listener, err := net.Listen("tcp", 127.0.0.1:9090)
    if err != nil {
        log.Print("net.Listen : ", err)
        return
    }

    for {
        conn, err := listener.Accept()
        if err != nil {
            log.Print("listener.Accept : ", err)
            continue
        }

        go handle_conn(conn)
    }

    defer func() {
        listener.Close()
    }

}

func handle_conn(conn net.Conn) {
    buf := make([]byte, 1024)

    defer conn.Close()

    for {
        len, err := conn.Read(buf)
        if err != nil {
            log.Print("conn.Read : ", err)
            return
        }

       log.Print("recv message : ", string(buf[0:len]))
       conn.Write([]byte("server server write "))
    }

}
