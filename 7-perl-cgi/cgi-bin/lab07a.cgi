#!/usr/bin/perl -wT 
use CGI ':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser); 

use strict;
print "Content-type: text/html\n\n";

print "<!DOCTYPE html>";
print "<html><head>";
print "<title>Lab07a</title></head>";

print "<style>";

print "\@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght\@1,900&display=swap');";

print "</style>";

print "<body>";
print qq(<div style="font-family: 'Roboto', sans-serif; 
            text-align: center; color:blue; font-size: 5em;">); 
print "This is my first Perl program";

print "</div></body></html>";
