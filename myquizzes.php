<?php
	session_start();

	require_once("dbutil.class.php");

	$owner = $_SESSION['name'];
?>
<script type="text/javascript">
	$(function(){
		
		$('i').click(function(){
			var id = $(this).attr('id');
			$.post(
				'handle_delete.php?',
				{ id: id
				},
				function(data){
					$('main').load('myquizzes.php');
				},
				'html'
			);
		});

		$('tr').click(function(){
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


<link rel="stylesheet" href="style/style_mobile_table.css">
<div class="mart">
<br>
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp center ">
<thead>
<tr>
	<div class="mdl-grid">
		<th class="mdl-cell mdl-cell--2-col ">MyQuizz</th>
		<th class="mdl-cell mdl-cell--2-col ">Beschreibung</th>
		<th class="mdl-cell mdl-cell--2-col "></th>
		</div>
	</tr>
</thead>	


<?php
	$quizzes = DBUtil::getAllQuizzesPerOwner($owner);

	foreach($quizzes as $quiz){
			
		echo "<tr id='" . $quiz->id . "'>";
		echo "  <td data-label='MyQuizz'>" . $quiz->quizname . "</td>";
		echo "  <td data-label='Beschreibung'>" . $quiz->quizdescription . "</td>";
		
		echo "<td ><i class='material-icons color-main' role='presentation' id='" . $quiz->id . "' style='cursor:pointer; color: #ED2553'>delete</i></td>";
		echo "</tr>";
			
	}
?>

</table>

</div>