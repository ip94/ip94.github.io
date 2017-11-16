<!DOCTYPE html>
<%
dim lastvisit, visitresponse
Response.Cookies("LastVisit").Expires=date+365
lastvisit = Request.Cookies("LastVisit")
Response.Cookies("LastVisit") = formatDateTime(Now, 0)
thisvisit = Request.Cookies("LastVisit")
if lastvisit == "" then
    visitresponse = "This is your first visit."
else
    visitresponse = "You last visited on "&lastvisit
%>
<html>
<head>
    <title>Lab 8 Response</title>
    <style type="text/css">
        p {background: rgba(0, 0, 0, 0.5); border-radius: 5px}
        body { text-align: center; font: bold 2em serif; background: cover 
            <% dim selected
            selected = Request.QueryString("background")
            select case selected
                case "wood"
                    ="url(http://www.psdgraphics.com/file/oak-wood.jpg)"
                case "rock"
                    ="url(https://clpan.files.wordpress.com/2011/03/free-stock-images-stone-wall-texture.jpg)"
                case "sand"
                    ="url(http://www.background-texture.com/backgroundtextures/water/backgroundtexture-water5.jpg)"
                case "swirl"
                    ="url(https://assets.awwwards.com/awards/images/2015/04/pattern.jpg)"
                end select
            %>;
        }
    </style>
</head>
<body>
<h1></h1>
<p>Thanks for visiting. This visit started on <% =thisvisit %></p>
<p><% =visitresponse %></p>
</body>
</html>