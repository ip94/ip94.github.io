#!/usr/bin/perl

print "Content-type: text/html\n\n";

$title = "first Perl program";
$font = "Sofia";
print header();
print body();

sub header {
$doc_font = imp_fonts($font);
$all_style = style();
return qq{<HTML>\n<HEAD>\n<title>$title</title>\n$doc_font\n$all_style\n</head>};
}

sub imp_fonts {
return qq{<link href="https://fonts.googleapis.com/css?family=$font" rel="stylesheet">};
}

sub style {
$style = qq{
<style type="text/css">
<!-- 
H1 {font-family: '$font'; font-size: 3em; color: red; text-align: center}
-->
</style>};

return $style;
}

sub body {

$body = qq{
<BODY>
<H1>This is my $title</H1>
</BODY>
</HTML>};

return $body;
}
