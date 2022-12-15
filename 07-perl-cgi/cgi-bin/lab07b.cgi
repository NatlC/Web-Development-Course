#!/usr/bin/perl -wT 
use strict; 
use CGI; 
use CGI::Carp qw ( fatalsToBrowser ); 
use File::Basename; 

my $safe_filename_characters = "a-zA-Z0-9_.-"; 
my $upload_dir = "/home/n12chan/public_html/cgi-bin/"; 
my $query = new CGI; 
my $filename = $query->param("photo"); 
my $first = $query-> param("first");
my $last = $query-> param("last");
my $street = $query-> param("street");
my $city = $query-> param("city");
my $postal = $query-> param("postal");
my $phone = $query-> param("phone");
my $email = $query-> param("email");
my $province = $query-> param("dropdown");

my $phonebool = "none";
my $postalbool = "none";
my $emailbool = "none";

if (not ($phone =~ m/^[0-9]{10}$/g)) {
    $phonebool = "#FFCCCB";     
}

if (not ($postal =~ m/^[A-Za-z]{1}[0-9]{1}[A-Za-z]{1}[ ][0-9]{1}[A-Za-z]{1}[0-9]{1}$/g)) {
    $postalbool = "#FFCCCB";
}

if (not ($email =~ m/^[A-Za-z0-9\.\-]+\@[A-Za-z0-9\.\-]+\.[A-Za-z0-9]{2,63}$/g)) {
    $emailbool = "#FFCCCB";
}

if ( !$filename ) { print $query->header ( ); print "";} 
my ( $name, $path, $extension ) = fileparse ( $filename, '\..*' ); 
$filename = $name . $extension; 
$filename =~ tr/ /_/; 
$filename =~ s/[^$safe_filename_characters]//g; 
if ( $filename =~ /^([$safe_filename_characters]+)$/ ) { $filename = $1; } else { die "Filename contains invalid characters"; } 
my $upload_filehandle = $query->upload("photo"); 
open ( UPLOADFILE, ">$upload_dir/$filename" ) or die "$!"; binmode UPLOADFILE; 
while ( <$upload_filehandle> ) { print UPLOADFILE; } 
close UPLOADFILE; 
print $query->header ( ); 
print <<END_HTML; <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Thanks!</title> 
<style type="text/css"> 
    img {border: none;} 
    .phone {background-color: $phonebool;}
    .postal {background-color: $postalbool;}
    .email {background-color: $emailbool;}
    p {font-size: 1.5rem;}
</style> 
</head> 
<body> 
    <h1>Form Submitted Sucessfully</h1>
    <h2>If you have any input errors, the section will be highlighted in light red</h2>
    <p>First name: $first</p> 
    <p>Last name: $last</p> 
    <h2>Address:</h2>
    <p>Street: $street</p> 
    <p>City: $city</p> 
    <p class="postal">Postal code: $postal</p> 
    <p class="phone">Phone number: $phone</p> 
    <p class="email">Email: $email</p> 
    <p>Province: $province</p> 
    <img src="$filename" alt="Photo"> 
</body> 
</html> 
END_HTML