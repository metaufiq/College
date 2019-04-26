import smtplib
import time
import imaplib
import email

ORG_EMAIL   = "@gmail.com"
FROM_EMAIL  = "email" + ORG_EMAIL
FROM_PWD    = "password"
SMTP_SERVER = "imap.gmail.com"
SMTP_PORT   = 993

def runInput(user_input,first_index):
     if user_input == "next":
         print '\n\n\n'
         first_index = first_index + 20
         for i in range(first_index,first_index+20):
             print emailPaging[i]
      

     elif user_input == "prev":
         first_index = first_index - 20
         for i in range(first_index, first_index+20):
             print emailPaging[i]
     else:
         first_index = int(userInput)
         for i in range(first_index, first_index+20):
             pass
     userInput=raw_input("input: ")
     runInput(userInput,first_index)  
try:
    mail = imaplib.IMAP4_SSL(SMTP_SERVER)
    mail.login(FROM_EMAIL,FROM_PWD)
    mail.select('inbox')
    type, data = mail.search(None, 'ALL')
    mail_ids = data[0]

    id_list = mail_ids.split()
    first_email_id = int(id_list[0])
    latest_email_id = int(id_list[-1])


    emailPaging = []
    y = 1
    for i in range(latest_email_id,first_email_id, -1):
        typ, data = mail.fetch(i, '(RFC822)' )
        if y == 91:
            break
        for response_part in data:
            if isinstance(response_part, tuple):
                msg = email.message_from_string(response_part[1])
                email_subject = msg['subject']
                email_from = msg['from']
                emailPaging.append('index '+ str(y) +'\t From : ' + str(email_from) + '\t' + 'Subject : ' + str(email_subject) + '\n')
                y= y+1
                print 'count email: ' + str(y) + '\n\n'
                if y == 91:
                    break

    
    firstIndex = 0
    for x in range(20):
            print(emailPaging[x])

    userInput=raw_input("input: ")
    runInput(userInput,firstIndex)


except Exception, e:
    print str(e)