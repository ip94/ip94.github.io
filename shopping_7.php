<!DOCTYPE html>
<?php
session_start();

$id = $idErr = $valid = "";//define variables id and idErr

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    log_out();
}

// to determine if visitor is logged in or not
// $_SESSION['name'] should be defined if visitor has not logged out.
if(isset($_SESSION['name'])) {
    $id = $_SESSION['name'];
    $valid = True;
// Visitor not validated
//check if form was submitted
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        $idErr = "Missing";
    }
    else {
        $interim_id = test_input($_POST["id"]); //get input text
        $file = "id_list.txt";
        $fh = fopen($file, 'r');
        $data = fread($fh, filesize($file));
        fclose($fh);
        $id_list = preg_split('/\r\n|\r|\n/', $data);
        $valid = check_valid($interim_id);
        if (!$valid) {
            $idErr = "Invalid User";
        } else {
            $id = $_SESSION['name'];
        }
    }

}
// retrieve data from valid id list id_list.txt

?>
<html lang="en">
<head>
    <title>Shopping Heaven</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    <a class="active navbar-brand nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/myshopping.php">Category 1</a>
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
                    <button type="submit" class="btn btn-primary">Log Out</button>
                </form>
            </span>
            
        </div>
    </nav>
    <main>
<?php if (!$id or !$valid): ?>
    <div class="container">
        <form class="form-inline form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group col-12">
                <label class="control-label col-3" for="email">Email address:</label>
                <input class="form-control col-6" type="email" name="id">
                <span class="col-3"><?php echo $idErr ?></span><br> <!-- TODO: check display -->
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
<?php else: ?>
    <div class="container">
        <div class="jumbotron">
            <h2>You have entered the homepage as <?php echo $id ?></h2>
            <p>Feel free to roam around the pages.</p>
            <p>Please log out before leaving.</p>
        </div>
    </div>
<?php endif; ?>

<?php 
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    function check_valid ($input) {
        if (in_array($input, $id_list)) {
            $response = True;
            $_SESSION['name'] = $interim_id; //TODO: try to extend this session to myshopping1.php
        } else {
            $response = False;
        }
        return $response;
    }

    function log_out() {
        session_unset();
        session_destroy();
    }
?>

    </main>
</body>
</html>