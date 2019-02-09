
<div class="container">

    <!-- Main component for for not logged in users -->
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
