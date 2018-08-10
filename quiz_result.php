<link rel="stylesheet" href="style/quiz_result_style.css">

<?php
session_start();
 $points = $_SESSION['achievedPoints'];
 $maxPoints = $_SESSION['ofPoints'];
?>

<div class="mdl-grid">
<div class="mdl-layout-spacer"></div>
    <div class="box animated pulse mdl-cell mdl-cell--5-col mdl-cell--4-col-mobile center">

        <div id="over" class="mdl-cell mdl-cell--12-col">
            <h1 id="Titel">QUIZZIE VORBEI!</h1>

            <p id="Punkte">Dein Punktestand ist:</p>
                <span id="endpoints"><?php echo $points ?></span> von
                <span id="possiblepoints"><?php echo $maxPoints ?></span>
            
            
                <button id="btn_again" class="mdl-cell mdl-cell--12-col" role="button">Nächstes Quizzie</button>
            
        </div>


    </div>
    <div class="mdl-layout-spacer"></div>
</div>
<script>
        $('#btn_again').click(function () {
            $('main').load('category.php');
            changePageTitle(txt_cat);
        });
</script>

