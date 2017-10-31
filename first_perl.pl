#!/usr/bin/perl

use CGI':standard';
use strict;

print "Content-type: text/html\n\n";

our $title = "first Perl program";
our $font = "Sofia";
print get_header();
print get_body();

sub get_header {
my $doc_font = imp_fonts($font);
my $all_style = get_style();
return qq{<HTML>\n<HEAD>\n<title>$title</title>\n$doc_font\n$all_style\n</head>};
}

sub imp_fonts {
return qq{<link href="https://fonts.googleapis.com/css?family=$font" rel="stylesheet">};
}

sub get_style {
my $style = qq{
<style type="text/css">
<!-- 
H1 {font-family: '$font'; font-size: 3em; color: red; text-align: center}
-->
</style>};

return $style;
}

sub get_body {

my $body = qq{
<BODY>
<H1>This is my $title</H1>
</BODY>
</HTML>};

return $body;
}
