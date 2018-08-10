<link rel="stylesheet" href="style/home.css">
<script type="text/javascript">

	$('#to_login_btn').click(function () {
		$('main').load('login.html');
		changePageTitle(txt_anmelden);
	});
	
	$('#to_cat_btn').click(function () {
		$('main').load('category.php');
		changePageTitle(txt_cat);
	});
	
	$('#to_myq_btn').click(function () {
		$('main').load('myquizzes.php');
		changePageTitle(txt_myquizzes);
	});

	$('#btn_submit').click(function () {
		var term = document.getElementById('term').value;
		if(document.getElementById('option1').checked) {
		var search = document.getElementById('option1').value;
		}
		if(document.getElementById('option2').checked) {
		var search = document.getElementById('option2').value;
		}
		if(document.getElementById('option3').checked) {
		var search = document.getElementById('option3').value;
		}
		changePageTitle(txt_cat);
		$.post(
			'search_results.php',
			{
				term: term,
				search: search
			},
			function (data) {
				$('main').load('search_results.php');
			},
			'html'
		);
	});
</script>
<?php
	session_start();
	require_once("dbutil.class.php");

?>

<div class="mdl-grid">
	<div class="mdl-layout-spacer"></div>

	<div id="playContainer" class="box animated pulse mdl-cell mdl-cell--9-col">
		<div class="title mdl-cell mdl-cell--12-col">Was möchtest du tun?
		</div>
		<br>
		<div class="mdl-grid">
					<?php
						if(!(!isset($_SESSION['login']) || $_SESSION['login'] == 0)) { ?>
					<button id="to_myq_btn" class="mdl-cell mdl-cell--12-col" role="button">Zu MyQuizzes</button>
					<?php } else { ?>
					<button id="to_login_btn" class="mdl-cell mdl-cell--12-col" role="button">Zum Login</button>
					<?php } ?>
					<button id="to_cat_btn" class="mdl-cell mdl-cell--12-col" role="button">Zum Katalog</button>
		</div>
		
		<!--ANMERKUNG: Suche, die leider nicht funktioniert, wissen auch nicht warum -->

		<!--<div>
			<form id="searchform" action="#">
				<div class="row">
					<div class="col-md-6">
						<p>
							<label>Quiz finden:
								<label>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>
							<input type="text" name="term" id="term" placeholder="Suche" class="answer">
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<table>
							<tr>
								<td>
									<label class="mdl-radio mdl-js-radio" for="option1">
										<input type="radio" id="option1" name="search" class="mdl-radio__button" >
										<span class="mdl-radio__label" value="num">Nummer</span>
									</label>
								</td>

								<td>
									<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option2">
										<input type="radio" id="option2" name="search" class="mdl-radio__button" value="tit" checked>
										<span class="mdl-radio__label">Titel</span>
									</label>
								</td>

								<td>
									<label class="mdl-radio mdl-js-radio" for="option3">
										<input type="radio" id="option3" value="cat" name="search" class="mdl-radio__button">
										<span class="mdl-radio__label">Kategorie</span>
									</label>
								</td>
							</tr>
						</table>
					</div>
				</div>


			</form>


			<div class="row">
				<div class="col-md-6">
					<p>
						<button id="btn_submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect color-main-btn">
							<i class="material-icons">save</i>
						</button>
					</p>
				</div>
			</div>
		</div>-->
	</div>


	<div class="mdl-layout-spacer"></div>

</div>

</div>





</div>





<!-- <script src="js/quiz_logic.js"></script> -->