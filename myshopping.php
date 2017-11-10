<!DOCTYPE html>
<?php
session_start();

if ($_POST["logout"]) {
    log_out();
}

// TODO: Do we need a warning if session was not created?
if(isset($_SESSION['name'])) {
    $id = $_SESSION['name'];
    $valid = TRUE;
} else {
    $id = "";
    $valid = FALSE;
}

function log_out() {
    session_unset();
    session_destroy();
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
     <div class="container-fluid">
        <h1>Shopping Heaven<br><small>Where all your cravings are satisfied</small></h1>  
    </div>
    <br>
    <nav class="navbar navbar-inverse bg-inverse">
        <div class="container">
            <ul class="nav navbar-nav">
                <li class="">
                    <a class="active navbar-brand nav-link" href="/shopping_7.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/myshopping1.php">Category 2</a>
                </li>
            </ul>
            <span class="navbar-right pull-right form-inline">
                <form method="GET" action="" style="color: white">
                    <?php
                    if ($valid) {
                        echo "Logged in as ".$id." ";
                    } else {
                        echo "Not logged in ";
                    }
                    ?>
                    <button type="submit" name="logout" value="true" class="btn btn-primary">Log Out</button>
                </form>
            </span> 
        </div>
    </nav>
    <main>
    <?php if (!$valid): ?>
        <div class="container">
            <div class="jumbotron">
                <h2>You are not logged in.</h2>
                <p>Please go to Home to log in before proceeding.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="container">
            <div class="jumbotron">
                <h2>You have entered Shopping Category 1 as <?php echo $id ?>.</h2>
                <p>Feel free to roam around the pages.</p>
                <p>Please log out before leaving.</p>
            </div>
        </div>
    <?php endif; ?>
    </main>
</body>
</html>