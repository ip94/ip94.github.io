#!/usr/bin/perl

use CGI':standard';
use strict;

print "Content-type: text/html\n\n";

our $id = param('identity');
our @grade = param('grade');
our $comment = lc(param('comments'));
our $grade = get_grade(@grade);
our $response = respond($id, $grade);
our $full_id = id_transform($id);

sub get_grade {
    my $sum = 0;
    my $num;
    foreach $num (@_) {
        $sum += $num;
    }
    return $sum;
}

sub respond {
    if ($_[0] eq 'inst') {
        if ($_[1] < 100) {
            return qq{I wish you gave me a higher grade};
        }
        return qq{I thank you very much for your grade};
    } else {
        return qq{the grade you gave does not matter};
    }
}

sub id_transform {
    if ($_[0] eq "inst") {
        return qq{the instructor};
    }
    elsif ($_[0] eq "stud") {
        return qq{a student};
    }
}
        

our $title = "Interactive Perl";
our $font = "Sofia";

sub get_header {
    my $doc_font = imp_fonts($font);
    my $all_style = get_style();
    return qq{<HTML>\n<head>\n<title>$title</title>\n$doc_font\n$all_style\n</head>};
}

sub imp_fonts {
    return qq{<link href="https://fonts.googleapis.com/css?family=$font" rel="stylesheet">};
}

sub get_style {
    my $style = qq{
<style type="text/css">
<!-- 
body {font-family: '$font'; font-size: 3em; text-align: center}
-->
</style>};

return $style;
}

sub get_content {
    return qq{You gave me a grade of $_[0].\n
    Since you are $_[1] in the course, $_[2].\n
    Thank you also for your feedback that students should be $_[3].};
}

sub get_body {
    my $doc_response = get_content($grade, $full_id, $response, $comment);
    my $body_content = qq{
<body>
<H1>Responses</H1>
<p>$doc_response</p>
</body>
</html>};

return $body_content;
}

print get_header();
print get_body();
