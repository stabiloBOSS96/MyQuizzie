<?php
	session_start();

	require_once("dbutil.class.php");

	if(!isset($_SESSION)){
		$owner = $_SESSION['name'];
	}
	
?>


<link rel="stylesheet" href="style/style_mobile_table.css">

<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--6-col">

		<div class="mart">
			<br>
			<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp center ">
				<thead>
					<tr>
						<div class="mdl-grid">
						<th class="mdl-cell mdl-cell--2-col ">#</th>
							<th class="mdl-cell mdl-cell--2-col ">Player</th>
							<th class="mdl-cell mdl-cell--2-col ">Spiele gespielt</th>
							<th class="mdl-cell mdl-cell--2-col ">MyQuote</th>
						</div>
					</tr>
				</thead>


				<?php
	
	$stats = DBUtil::getRankingPlayer();
	$rank = 0;

	foreach($stats as $stat){
			$rank++;
		echo "<tr>";
		echo "  <td data-label='#' class='color-main'>" . $rank . "</td>";
		echo "  <td data-label='Player'>" . $stat->name . "</td>";
		?>	<script>console.log($stat->name)</script><?php
		echo "  <td data-label='Spiele gespielt'>" . $stat->games . "</td>";
		echo "  <td data-label='MyQuote'>" . $stat->prozent . "%</td>";
		echo "</tr>";
			
	}
?>

			</table>

		</div>
	</div>
	<div class="mdl-cell mdl-cell--6-col">
		<div class="mart">
			<br>
			<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp center ">
				
				<thead>
					<tr>
						<div class="mdl-grid">
							<th class="mdl-cell mdl-cell--2-col ">MyQuizzie</th>
							<th class="mdl-cell mdl-cell--2-col ">gespielt</th>
						
						</div>
					</tr>
				</thead>


				<?php
	
	$games = DBUtil::getRankingQuiz();

	foreach($games as $game){
			
		echo "<tr>";
		echo "  <td data-label='MyQuizzie' >" . $game->name . "</td>";
		echo "  <td data-label='gespielt'>" . $game->games . "</td>";
		echo "</tr>";
			
	}
?>
			</table>

		</div>

	</div>

</div>