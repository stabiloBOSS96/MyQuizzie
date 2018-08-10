<link rel="stylesheet" href="style/card_style.css">
<script type="text/javascript">

  $('#btn_newCategory').click(function () {
    $('main').load('create_category.html');
    changePageTitle(txt_create_category);
  });
  $('#btn_newQuiz').click(function () {
    $('main').load('create_quiz.php');
    changePageTitle(txt_create_quiz);
  });
  
		
		$('select').change(function(){
      var id = this.value;
      changePageTitle("Quiz #"+id);
			$.post(
				'handle_chooseQuiz.php?',
				{ id: id
				},
				function(data){
					$('main').load('play_quiz.html');
				},
				'html'
			);
		});
		

</script>
<style>
  .demo-card-square.mdl-card {
    height: 320px;
  }
</style>
<?php
	session_start();
	require_once("dbutil.class.php");

?>



<div class="mdl-grid">

  <?php
  $categories = DBUtil::getAllCategories();
  
  if (!empty($categories)){
    
    foreach($categories as $category){
      //Random Farbe wird erzeugt
      $rand_color = sprintf("#%06X\n", mt_rand( 0, 0xFFFFFF ));
     
     
      echo "<div class='demo-card-square mdl-card mdl-shadow--2dp animated flipInX mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet'>";
      echo "<div class='mdl-card__title mdl-card--expand'style='background: ".$rand_color."'>";
      echo "<h2 class='mdl-card__title-text'>" . $category->title . "</h2></div>";
      echo "<div class='mdl-card__supporting-text'>" . $category->description . "</div>";
      echo "<div class='mdl-card__actions mdl-card--border'>";
    
      $quizzes = DBUtil::getAllQuizzesPerCategory($category->id);
  
      if (!empty($quizzes)){
         echo "<select class='mdl-textfield__input' id='sort'><option disabled selected value> Wähle ein Quizzie... </option>";
         foreach($quizzes as $quiz){
          echo "<option value='".$quiz->id."'>".$quiz->quizname."</option>";
         }
         echo "</select>";
      }else{
        echo "<div class='mdl-card__supporting-text'>Sei der erste der hier ein Quiz erstellt!</div>";
      }
      echo "</div></div>";
      
      
      }
      

     
   }else{
    $rand_color = sprintf("#%06X\n", mt_rand( 0, 0xFFFFFF ));
    echo "<div class='mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet'>";
    echo "<div class='demo-card-square mdl-card mdl-shadow--2dp animated flipInX'>";
    echo "<div class='mdl-card__title mdl-card--expand'style='background: ".$rand_color."'>";
    echo "<h2 class='mdl-card__title-text'>Willkommen</h2></div>";
    echo "<div class='mdl-card__supporting-text'>Erstelle als erstes eine neue Kategorie!</div>";
    echo "</div></div>";
  }
  
	
  ?>

  <?php
  if(!(!isset($_SESSION['login']) || $_SESSION['login'] == 0)) { ?>
        <!--Wenn LOGIN erfolgreich-->
       <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet animated flipInX">
        <button class="mdl-button mdl-js-button  mdl-js-ripple-effect color-main " id="btn_newCategory">
        <i class="material-icons">add</i>Kategorie
        </button>
        <br>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect color-main" id="btn_newQuiz">
         <i class="material-icons">add</i>Quiz
        </button>
     <?php } ?>
        </div>


   

</div>