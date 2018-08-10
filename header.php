<?php
    session_start();
?>

<link rel="stylesheet" href="style/header_style.css">

<div class="demo-drawer-header center">
<img src="images/user.jpg" class="demo-avatar center">

        
       
<?php
    if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
        echo "<span class='userInfo'>Hallo " . $_SESSION['name'] . "</span><br>";
        ?>
         <div class="mdl-layout-spacer"></div>
          
        </div>
        <?php
    }else{
        echo "<span class='userInfo '><a class='color-white'>Melde dich an!</a></span>";
    }
?>
        
         

</div>