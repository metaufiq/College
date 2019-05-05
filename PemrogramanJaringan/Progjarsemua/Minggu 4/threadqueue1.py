import threading
import Queue
import time

myQueue = Queue.Queue()

class count_stuff(threading.Thread):
	def _init_(self, start_num, end, q):
		self.num = start_num
		self.end = end
		self.q = q
		threading.Thread._init_(self)

def run(self):
	while True:
		if self.num !=self.end:
			self.num +=1
			self.q.put(self.num)
			time.wait(5)
		else:
			break

myThread = count_stuff(1, 5, myQueue)
myThread.start()

while True:
	if not myQueue.empty():
		val = myQueue.get()
		print"Outputting:", val
	time.wait(2)

myThread = count_stuff(1, 5, myQueue)
myThread.start()

while True:
	if not myQueue.empty():
		val = myQueue.get()
		print"Outputting: ", val
	time.wait(2)