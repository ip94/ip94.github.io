#!/usr/bin/ruby -w
puts "Content-type: text/html\n\n"

require 'cgi'
cgi = CGI.new

# Store input data
params = cgi.params
params.each do |key, value|
  params[key] = value[0]
end

name1 = params['name']
street = params['street'].capitalize
city = params['city'].capitalize
province = params['province'].capitalize
phone = params['phone'].split('-')

html1 = <<~HERE1
  <!DOCTYPE html>
  <html>
  <header>
  <title>Lab 10 Response</title>
  <meta charset="utf-8">
  <style type="text/css">
  body {text-align: center}
  b {font-size: 5em;}
  </style>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script> 
  <script>
    $(document).ready(function(){
       $("#f1").fadeIn();
       $("#f2").fadeIn(1500);
       $("#f3").fadeIn(3000);
    });
  </script>
  </header>
  <body>
HERE1

html2 = <<~HERE2
  </body>
  </html>
HERE2

block = <<~PHONE
<b style='position:relative; display:none' id='f1'>(#{phone[0]})</b>
<b style='position:relative; display:none' id='f2'>#{phone[1]}</b>
<b style='position:relative; display:none' id='f3'>-#{phone[2]}</b>
PHONE


puts html1
puts "<h2>Hello #{name1}</h2>"
puts "<h2>Your address is #{street}, #{city}, #{province}</h2>"
puts "<h2>Your phone number is:</h2>"
puts "<h1>"+block+"</h1>"
puts html2
puts