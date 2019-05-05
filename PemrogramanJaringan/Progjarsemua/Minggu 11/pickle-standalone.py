import pickle
mylist = []

mylist.append('This is string')
mylist.append(5)
mylist.append(('localhost', 5000))

print mylist

p = pickle.dumps(mylist)
print p
u = pickle.loads(p)
print u