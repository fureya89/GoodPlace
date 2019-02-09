<!DOCTYPE html>

<?php
include 'registration.php';

$errorUsername = '';
$errorEmail = '';
$errorPassword = '';
$isRegistrationCorrect = false;

if (isset($_POST['send'])) {
    print_r($_POST);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$username) {
        $errorUsername = 'Uzupełnij login!';
    }
    if (!$email) {
        $errorEmail = 'Uzupełnij email!';
    } elseif ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = 'Email ma nieporawny format!';
    }
    if (!$password) {
        $errorPassword = 'Uzupełnij hasło!';
    } elseif ($password && strlen($password) < 6) {
        $errorPassword = 'Hasło musi zawierać minimum 6 znaków!';
    }
    if (!$errorUsername && !$errorEmail && !$errorPassword) {
        //$statement = $mysqli->prepare("INSERT login (username,password,email) VALUE (?,?,?)");
        //$statement->bind_param("sss",$username,$email,$password);
        //$statement->execute();
        //$statement->close();

        $uRegistration = new Registration($username, $email, $password);
        $isRegistrationCorrect = $uRegistration->userRegistration();
    }
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="bootstrap-3.3.7/docs/favicon.ico">

        <title>Fixed Top Navbar Example for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="navbar-fixed-top.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Header for for not logged in users -->
        <?php require 'includes/header.php' ?>

        <!-- Main component for for not logged in users -->
        <?php require 'includes/homeNotLogged.php' ?>



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
