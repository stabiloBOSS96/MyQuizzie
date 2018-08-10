
<script>
$(function(){
		
		$('i').click(function(){
			var id = $(this).attr('id');
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
		
	});
</script>

<?php
$num = false; // true, wenn nach Nummer gesucht wird
$cat = true; // true, wenn nach Kategorie gesucht wird
$tit = false; // true, wenn nach TItel gesucht wird
session_start();
require_once("dbutil.class.php");



$term = $_POST['term'];
echo $_POST['search'];
?>

<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
<thead>
<tr>
		<th class="mdl-cell mdl-cell--2-col">#</th>
		<th class="mdl-cell mdl-cell--2-col">Titel</th>
		<th class="mdl-cell mdl-cell--2-col">Beschreibung</th>
		<th class="mdl-cell mdl-cell--2-col">Kategorie</th>
		<th class="mdl-cell mdl-cell--2-col"></th>
	</tr>
</thead>	


<?php
	
	if($num == true)
	{
		$quizzes = DBUtil::getAllQuizzesPerNumberSearch($term);

		foreach($quizzes as $quiz){
			
			echo "<tr>";
			echo "  <td>" . $quiz->id . "</td>";
			echo "  <td>" . $quiz->name . "</td>";
			echo "  <td>" . $quiz->bes . "</td>";
			echo "  <td>" . $quiz->title . "</td>";
			
			echo "<td><i class='color-main material-icons' role='presentation' id='" . $quiz->id . "' style='cursor:pointer;'>play_arrow</i></td>";
			echo "</tr>";
				
		}
	}
		elseif($cat == true)
		{	
			$quizzes = DBUtil::getAllQuizzesPerCategorySearch($term);
			foreach($quizzes as $quiz){
			
				echo "<tr>";
				echo "  <td>" . $quiz->id . "</td>";
				echo "  <td>" . $quiz->name . "</td>";
				echo "  <td>" . $quiz->bes . "</td>";
				echo "  <td>" . $quiz->title . "</td>";
				
				echo "<td><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation' id='" . $quiz->id . "' style='cursor:pointer;'>play_arrow</i></td>";
				echo "</tr>";
			
			}
		}
			elseif($tit == true)
			{
				$quizzes = DBUtil::getAllQuizzesPerTitelSearch($term);
				foreach($quizzes as $quiz){
			
					echo "<tr>";
					echo "  <td>" . $quiz->id . "</td>";
					echo "  <td>" . $quiz->name . "</td>";
					echo "  <td>" . $quiz->bes . "</td>";
					echo "  <td>" . $quiz->title . "</td>";
					
					echo "<td><i class='mdl-color-text--blue-grey-400 material-icons' role='presentation' id='" . $quiz->id . "' style='cursor:pointer;'>play_arrow</i></td>";
					echo "</tr>";
			
				}
			}
				
?>

</table>