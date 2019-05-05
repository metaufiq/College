import socket
import select
import sys
import msvcrt

server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
IP_adress = '127.0.0.1'
Port = 8081
server.connect((IP_adress, Port))

while True:
	sockets_list = [server]
	read_sockets,write_socket,error_socket = select.select(sockets_list,[],[],1)
	if msvcrt.kbhit(): read_sockets.append(sys.stdin)

	for socks in read_sockets:
		if socks == server:
			message = socks.recv(2048)
			print message

		else:
			message = sys.stdin.readline()
			server.send(message)
			sys.stdout.write("<You>")
			sys.stdout.write(message)
			sys.stdout.flush()

server.close()