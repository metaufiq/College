import socket
import sys

s = socket.socket()
s.connect(("127.0.0.1",8081))
try:
    f = open('Test.txt',"rb")
    f.close()
except IOError as e:
    	print "hehe"
    	s.close()
    	sys.exit()
f = open('Test.txt',"rb")
l = f.read(1024)
while (l):
    s.send(l)
    l = f.read(1024)
s.close()