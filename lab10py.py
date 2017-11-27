#!/usr/bin/python

# Import modules for CGI handling 
import cgi, cgitb 

# Create instance of FieldStorage 
form = cgi.FieldStorage() 

# Get data from fields
info_list = [name,street,city,province]
phone = str.split(form.getvalue('phone'),"-")
for item in info_list:
    item = str.capwords(form.getvalue(str(item)))

phone_str = """
<div style='position:relative; display:inline-block' id='f1'>(%s)</div>
<div style='position:relative; display:inline-block' id='f2'>%s</div>
<div style='position:relative; display:inline-block' id='f3'>-%s</div>"""

jq_script = """
<script> 
$(document).ready(function(){
     $("#f1").animate({top: '250px'});
     $("#f2").animate({left: '250px',top: '250px'});
     $("#f3").animate({left: '250px'});
});
</script>"""
style = """
<style type="text/css">
    div {text-decoration: bold; font-size: 1.5em}
</style>"""

print ("Content-type:text/html\r\n\r\n")
print ("<html>")
print ("<head>")
print ("<title>Lab 10 Response</title>")
print ("<meta charset='utf-8'>")
print (style)
print ("<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js'></script> ")
print (jq_script)
print ("</head>")
print ("<body>")
print ("<h2>Hello %s</h2>" % (name))
print ("<h2>Your address is %s, %s, %s</h2>" %(street, city, province))
print ("<h2>Your phone number is:</h2>")
print (phone_str %(phone[0], phone[1], phone[2]))
print ("</body>")
print ("</html>")