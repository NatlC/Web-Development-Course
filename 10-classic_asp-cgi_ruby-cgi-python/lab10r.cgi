#!/usr/bin/ruby

require "cgi"
puts "Content-type: text/html\n\n";
cgi = CGI.new

puts "<style> * {margin: 0} </style>"

puts "<h1 style=\"color: blue; background-color: lightgreen; text-align: center; font-size: 128px; font-weight: bolder;\">"
puts cgi['city'].capitalize()
puts cgi['country'].capitalize()

puts "</h1>"

puts "<br>"
puts "<h2 style=\"margin-left: 1%;\">Province or State: "
puts cgi['provinceOrState'].capitalize()
puts "</h2>"

puts "<img style=\"width: 100%; height: auto\" src="
puts cgi['pictureURL']
puts " alt="
puts cgi['city'].capitalize()
puts ">"