<?php
	session_start();

	require_once("dbutil.class.php");

?>
<script type="text/javascript">
    var counter = 1;
    $('#btn_addQuestion').click(function () {
        counter++;
        $('#myTable').append('<tr><td class="mdl-data-table__cell--non-numeric " data-label="Nummer">' + counter + '</td>' +
            '<td data-label="Frage"><input class="mdl-textfield__input" type="text" name="question_' + counter + '" placeholder="Frage eingeben..."></td>' +
            '<td data-label="Antwort A"><input class="mdl-textfield__input" type="text" name="answer_a_' + counter + '" placeholder="Antwort eingeben..."></td>' +
            '<td data-label="Antwort B"><input class="mdl-textfield__input" type="text" name="answer_b_' + counter + '" placeholder="Antwort eingeben..."></td>' +
            '<td data-label="Antwort C"><input class="mdl-textfield__input" type="text" name="answer_c_' + counter + '" placeholder="Antwort eingeben..."></td>' +
            '<td data-label="Antwort D"><input class="mdl-textfield__input" type="text" name="answer_d_' + counter + '" placeholder="Antwort eingeben..."></td>' +
            '<td data-label="Richtige Antwort"><select name="answer_correct_' + counter + '" class="mdl-textfield__input"><option value="a" selected>A</option>' +
            '<option value="b">B</option><option value="c">C</option><option value="d">D</option></select></td></tr>');
    });

    $('#btn_saveQuestions').click(function () {
        $.post(
            'handle_createQuiz.php',
            $('#data_quiz').serialize(),
            function (data) {
                if (data == 1) {
                    document.getElementById("txt_container_error").style.visibility = "hidden";

                } else {
                    document.getElementById("txt_error").innerHTML = txt_error_noQuizname;
                    document.getElementById("txt_container_error").style.visibility = "visible";
                    $("#txt_container_error").addClass(" mdl-color-text--red");

                }
            },
            'html'
        );

        $.post(
            'handle_createQuestion.php',
            $('#data_quiz').serialize(),
            function (data) {
                if (data == 1) {
                    $('main').load('category.php');
                    document.getElementById("txt_container_error").style.visibility = "hidden";
                } else {

                    document.getElementById("txt_error").innerHTML = txt_error_questiontable;
                    document.getElementById("txt_container_error").style.visibility = "visible";
                    $("#txt_container_error").addClass(" mdl-color-text--red");
                }
            },
            'html'
        );

    });
</script>
<link rel="stylesheet" href="style/style_mobile_table.css">
<link rel="stylesheet" href="style/quiz_result_style.css">




<br>
<div>
    <form id="data_quiz" action="#">
        <div class="box animated pulse mdl-cell mdl-cell--10-col mdl-cell--12-col-mobile center">

            <div class="mdl-cell mdl-cell--12-col mdl-grid center">
                <input name="quizname" class="mdl-textfield__input mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet" type="text" placeholder="MyQuizz Name eingeben..." required>
                <br>
                <select class="mdl-textfield__input  mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet" name="category_id">
                <option disabled selected value> Wähle eine Kategorie... </option>
                    <?php
                        $categories = DBUtil::getAllCategories();
                    
                        foreach($categories as $category){
 
                            echo "<option value='". $category->id. "'>" . $category->title . "</option>";
    
                        }
                    ?>
                </select>
                <br>
                <input name="quizdescription" class="mdl-textfield__input  mdl-cell mdl-cell--12-col" type="text" placeholder="Beschreibung eingeben...">
                
                

                </select>
            </div>



        </div>
<br>

        <table class=" box mdl-data-table mdl-js-data-table mdl-data-table--selectable center mart mdl-cell mdl-cell--12-col" id="myTable">
            <thead>
                <tr>
                    <th class="mdl-cell--1-col">Nummer</th>
                    <th class="mdl-cell mdl-cell--2-col">Frage</th>
                    <th class="mdl-cell mdl-cell--2-col">Antwort A</th>
                    <th class="mdl-cell mdl-cell--2-col">Antwort B</th>
                    <th class="mdl-cell mdl-cell--2-col">Antwort C</th>
                    <th class="mdl-cell mdl-cell--2-col">Antwort D</th>
                    <th class="mdl-cell mdl-cell--1-col">Richtige Antwort</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric" data-label="Nummer">
                        1
                    </td>
                    <td data-label="Frage">
                        <input class="mdl-textfield__input" type="text" name="question_1" placeholder="Frage eingeben..." required>
                    </td>
                    <td data-label="Antwort A">
                        <input class="mdl-textfield__input" type="text" name="answer_a_1" placeholder="Antwort eingeben..." required>
                    </td>
                    <td data-label="Antwort B">
                        <input class="mdl-textfield__input" type="text" name="answer_b_1" placeholder="Antwort eingeben..." required>
                    </td>
                    <td data-label="Antwort C">
                        <input class="mdl-textfield__input" type="text" name="answer_c_1" placeholder="Antwort eingeben..." required>
                    </td>
                    <td data-label="Antwort D">
                        <input class="mdl-textfield__input" type="text" name="answer_d_1" placeholder="Antwort eingeben..." required>
                    </td>
                    <td data-label="Richtige Antwort">
                        <select name="answer_correct_1" class="mdl-textfield__input" required>
                            <option value="a" selected>A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </td>
                </tr>

            </tbody>
        </table>
    </form>
    <br>
<div class="mdl-grid center mdl-cell mdl-cell--2-col">

    <div class="mdl-cell mdl-cell--2-col center">
        <button id="btn_addQuestion" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect color-main-btn ">
            <i class="material-icons">add</i>
        </button>
    </div>
    <div class="mdl-cell mdl-cell--2-col center">
        <button id="btn_saveQuestions" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect color-main-btn">
            <i class="material-icons">save</i>
        </button>
    </div>

    
</div>