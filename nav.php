<?php
  session_start();
?>

<div class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
        <a  id="nav_home" class="mdl-navigation__link pointer">
          <i class="color-white material-icons" role="presentation">home</i>Home</a>
          <a  id="nav_create_quiz" class="mdl-navigation__link pointer" >
          <i class="color-white material-icons" role="presentation">videogame_asset</i>PLAY</a>
          <a  id="nav_stats" class="mdl-navigation__link pointer" >
          <i class="color-white material-icons" role="presentation">show_chart</i>Statistiken</a>
          
          <?php if(!isset($_SESSION['login']) || $_SESSION['login'] == 0) { ?>
            <a  id="nav_login" class="mdl-navigation__link pointer" >
          <i class="color-white material-icons" role="presentation">fingerprint</i>LOGIN</a>

          
      <?php } else { ?>
        <!--Wenn LOGIN erfolgreich-->
       
        <a  id="nav_myquizzes" class="mdl-navigation__link pointer">
          <i class="material-icons" role="presentation color-white">widgets</i>MyQuizzes</a>
        <a  id="nav_logout" class="mdl-navigation__link pointer">
          <i class="color-white material-icons" role="presentation">lock</i>LOGOUT</a>
      <?php } ?>
        
      
</div>