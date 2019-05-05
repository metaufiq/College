import smtplib

username = "ganiputrapanska@gmail.com"
password = ""
FROM_EMAIL_ADDRESS = username
TO_EMAIL_ADDRESS = "taufiq1689@gmail.com"
MESSAGE = "Hello"

server = smtplib.SMTP_SSL('smtp.gmail.com',465)
server.login(username,password)
server.sendmail(FROM_EMAIL_ADDRESS,TO_EMAIL_ADDRESS,MESSAGE)