<!DOCTYPE html>
<?php
session_start();
// TODO: Do we need a warning if session was not created?
if(isset($_SESSION['name'])) {
    $id = $_SESSION['name'];
}
?>
<html lang="en">
<head>
    <title>Shopping Heaven</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    </style>
</head>
<body>
    <div>
        <h1>Shopping Heaven<br><small>Where all your cravings are satisfied</small></h1>        
    </div>
    <br>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li><a href="/shopping_7.php">Home</a></li>
              <li><a href="/myshopping.php">Category 1</a></li>
              <li class="active"><a href="#">Category 2</a></li>
            </ul>
            <p class="nav navbar-nav navbar-right navbar-text">
                <?php if ($valid): ?>
                    Logged in as <?php echo "$id" ?>
                <?php else: ?>
                    Not logged in
            </p>
        </div>
    </nav>
    <main>
    <?php 
        if(!isset($_SESSION['name'])) {
    } else {

    } ?>
   <?php if (!$id): ?>
        <div class="container">
            <div class="jumbotron">
                <h2>You are not logged in</h2>
                <p>Please go to the home to log in before proceeding.</p>
            </div>          
        </div>
    <?php else: ?>
        <div class="container">
            <div class="jumbotron">
                <h2>You have entered Shopping Category 2 as <?= $id ?></h2>
                <p>Feel free to roam around the pages.</p>
            </div>
        </div>
    </main>
</body>
</html>