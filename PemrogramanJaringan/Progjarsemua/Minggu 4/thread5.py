import threading
import logging

logging.basicConfig(level=logging.DEBUG, format='(%(threadName)-10s) %(message)s',)

class MyThread(threading.Thread):
	def_init_(self,num):
		threading.Thread._init_(self)
		self.num = num
	def run(self):
		logging.debug(str(self.num) + 'running')

for i in range(5):
	t = MyThread()
	t.start()