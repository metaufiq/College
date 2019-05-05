import socket
import select
import sys
import msvcrt

server=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
IP_address='127.0.0.1' 
Port = 8081 
server.connect((IP_address,Port))

while True:
 sockets_list=[server]

 read_sockets,write_socket,error_socket=select.select(sockets_list,[],[],1)
 if msvcrt.kbhit(): read_sockets.append(sys.stdin)

 for socks in read_sockets:
  if socks==server:

   file_from_other_Client=socks.recv(1024)
   if file_from_other_Client:
    
    with open(file_from_other_Client,'w+') as cloudData:
     
     while True:
      data=socks.recv(1024)
      print "get data(" + data + ") from: "+ addr[0]
      
      cloudData.write(data)
      if not data:
       print "there is no data left from" + addr[0]
       break


      cloudData.close()
      break
    print ' receive success'
  else:

   message=raw_input()
   message.split(' ', 1)
   server.send(message[1])
   if message[0] == "SEND":
    with open(filename,'rb') as SendingFile:

     data=SendingFile.read(1024)
     while(data):
      server.send(data)
      data=SendingFile.read(1024)
      SendingFile.close()
    
    sys.stdout.write("<you> ")
    sys.stdout.write(filename)
    sys.stdout.write(" send"+message[1] + "to server")
    sys.stdout.flush()
server.close()