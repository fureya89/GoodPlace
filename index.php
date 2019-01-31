<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'dbConnect.php';
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
    }elseif($email && ! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorEmail = 'Email ma nieporawny format!';
    }
    if (!$password) {
        $errorPassword = 'Uzupełnij hasło!';
    } elseif ($password && strlen($password) < 6) {
        $errorPassword = 'Hasło musi zawierać minimum 6 znaków!';
    }
    if (!$errorUsername && !$errorEmail && !$errorPassword){
        $statement = $mysqli->prepare("INSERT login (username,password,email) VALUE (?,?,?)");
        $statement->bind_param("sss",$username,$email,$password);
        $statement->execute();
        $statement->close();
        $isRegistrationCorrect = true;        
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

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Good Place</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="bootstrap-3.3.7/docs/examples/navbar/">Default</a></li>
            <li><a href="bootstrap-3.3.7/docs/examples/navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Strona przykładowa</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod nulla ultricies, maximus dui quis, tincidunt erat. Donec dapibus dui ut odio vestibulum, sit amet faucibus dolor tristique. Vivamus porttitor luctus vehicula. Nam in lorem magna. Integer pharetra quis lorem tincidunt molestie. Morbi nec vehicula turpis. In tortor felis, vehicula consequat consectetur quis, vehicula malesuada sem. Ut sapien nisl, mattis at interdum ac, tempus in odio. Aenean urna mauris, sagittis quis volutpat at, sollicitudin nec ipsum. Phasellus leo dui, bibendum quis tempus nec, euismod sit amet tellus</p>
        <p>Proin sodales sollicitudin risus, sed tristique orci accumsan in. Morbi ac finibus magna. Nunc quis ipsum at metus lobortis condimentum. Vivamus fringilla odio augue, quis rutrum tortor hendrerit vitae. In lorem sapien, suscipit a hendrerit ut, sollicitudin id neque. Duis consequat, magna et feugiat rutrum, tellus tortor pellentesque leo, quis luctus lectus diam eu sem. Etiam pellentesque, orci non tincidunt mattis, mi quam sollicitudin sapien, sit amet congue nisi nisl ac sem. Maecenas quis aliquet nunc. Curabitur suscipit varius tempor. Nunc cursus erat at gravida sodales.</p>
      </div>
	  
	  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php 
                if ($isRegistrationCorrect) {
                    echo 'Udało Ci się zarejestrować.<br />';
                }
            ?>
            Login:<br>
            <?php
            if ($errorUsername != null) {
                echo $errorUsername . '<br />';
            }
            ?>
            <input type="text" name="username" value="">
            <br>
            Email:<br>
            <?php
            if ($errorEmail != null) {
                echo $errorEmail . '<br />';
            }
            ?>
            <input type="text" name="email" value="">
            <br>
            Hasło:<br>
             <?php
            if ($errorPassword != null) {
                echo $errorPassword . '<br />';
            }
            ?>           
            <input type="text" name="password" value="">
            <br><br>
            <input type="submit" name="send" value="Zarejestruj">
        </form> 

    </div> <!-- /container -->


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
