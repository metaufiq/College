from ftplib import FTP 

f = FTP('10.151.254.61')
print "Welcome:", f.getwelcome()

f.login('progjar', 'progjar123')

fd = open('kdei-bundle', 'wb')

f.retrbinary('RETR kdei-bundle', fd.write)
fd.close()
f.quit()