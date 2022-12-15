#!/usr/bin/python

import cgi, cgitb 

form = cgi.FieldStorage() 
city = form.getvalue('city').upper()
country = form.getvalue('country').upper()
provinceOrState = form.getvalue('provinceOrState').upper()
pictureURL = form.getvalue('pictureURL')
print "Content-type:text/html\n\n"

print "<style> * {margin: 0} img {width: 80%; height: auto; border: 5rem solid black;} </style>"

print "<h1 style=\"color: blue; background-color: lightgreen; text-align: center; font-size: 128px; font-weight: bolder;\">%s, %s</h1>" % (city, country)

print "<h2 style=\"margin-left: 1rem;\">Province or state: %s</h2>" % (provinceOrState)

print "<img src=%s" % (pictureURL)
print " alt=%s" % (city)
print ">"