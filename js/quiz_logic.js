var currentQuestionNo = 0;
var points = 0;
var rightAnswerPoints = 10;
var currentQuestion;
var questionPlayed = false;
var questions;
var length = 0;
var maxPoints = 0;
var quizState = false;




$(function () {
    $("#btn_finish").hide();
    $.post(
        'handle_getQuiz.php',
        {},
        function (data) {
            questions = data;
            startQuiz();
        },
        "json"
    );

});

function saveQuizStats() {
    $(function () {
        $.post(
            'handle_setQuizStats.php?',
            {
                points: points,
                maxPoints: maxPoints
            },
            function (data) {

            },
            'html'
        );
    });
}

function startQuiz() {

    quizState = true;
    showNextQuestion();
    getMaxPoints();
    $("#questionCount").text(length);
}

function getRightAnswer() {
    return currentQuestion.right_answer;
}


function validateAnswer() {
    if (questionPlayed == false) {
        var rightAnswer = getRightAnswer();
        var selectedAnswerId = $(".answer.btn-primary").attr("id");
        console.log(selectedAnswerId);
        switch (selectedAnswerId) {
            case "btn_answer_a":
                selectedAnswerId = "a";
                break;
            case "btn_answer_b":
                selectedAnswerId = "b";
                break;
            case "btn_answer_c":
                selectedAnswerId = "c";
                break;
            case "btn_answer_d":
                selectedAnswerId = "d";
                break;
        }

        $(".answer.btn-primary").removeClass("btn-primary");
        if (selectedAnswerId == rightAnswer) {
            points += rightAnswerPoints;
            $("#btn_answer_" + selectedAnswerId).addClass("btn-success");
            $("#btn_answer_" + selectedAnswerId).addClass("btn-success:hover");
        } else {
            $("#btn_answer_" + selectedAnswerId).addClass("btn-danger");
            $("#btn_answer_" + selectedAnswerId).addClass("btn-danger:hover");
            $("#btn_answer_" + rightAnswer).addClass("btn-success");
            $("#btn_answer_" + rightAnswer).addClass("btn-success:hover");

        }
        questionPlayed = true;
        if (currentQuestionNo == length) {
            //Quiz fertig
            $("#btn_finish").show();
            saveQuizStats();
            quizState = false;
        } else {
            $("#continue_btn").show();
        }
    }

}

function selectAnswer(id) {
    if (questionPlayed == false) {
        $(id).addClass("btn-primary");
    }
}

function deselectAnswer(id) {
    if (questionPlayed == false) {
        $(id).removeClass("btn-primary");
        $(id).removeClass("btn-danger");
        $(id).removeClass("btn-success");
        $(id).removeClass("btn-danger:hover");
        $(id).removeClass("btn-success:hover");
    }
}

$("#continue_btn").click(function () {
    showNextQuestion();
});
$("#btn_finish").click(function () {
    $('main').load('quiz_result.php');
    changePageTitle(txt_quizplayed);
});

$("#btn_answer_a").click(function () {
    selectAnswer("#btn_answer_a");
    deselectAnswer("#btn_answer_b");
    deselectAnswer("#btn_answer_c");
    deselectAnswer("#btn_answer_d");
    validateAnswer();
});

$("#btn_answer_b").click(function () {
    deselectAnswer("#btn_answer_a");
    selectAnswer("#btn_answer_b");
    deselectAnswer("#btn_answer_c");
    deselectAnswer("#btn_answer_d");
    validateAnswer();
});

$("#btn_answer_c").click(function () {
    deselectAnswer("#btn_answer_a");
    deselectAnswer("#btn_answer_b");
    selectAnswer("#btn_answer_c");
    deselectAnswer("#btn_answer_d");
    validateAnswer();
});

$("#btn_answer_d").click(function () {
    deselectAnswer("#btn_answer_a");
    deselectAnswer("#btn_answer_b");
    deselectAnswer("#btn_answer_c");
    selectAnswer("#btn_answer_d");
    validateAnswer();
});

function deselectAll() {
    deselectAnswer("#btn_answer_a");
    deselectAnswer("#btn_answer_b");
    deselectAnswer("#btn_answer_c");
    deselectAnswer("#btn_answer_d");
}

function showNextQuestion() {
    if (quizState == true) {
        $("#continue_btn").hide();

        questionPlayed = false;
        deselectAll();
        currentQuestion = questions[currentQuestionNo];
        $("#questionText").text(currentQuestion.question);
        $("#qno").text(currentQuestionNo + 1);
        $("#btn_answer_a").text(currentQuestion.answer_a);
        $("#btn_answer_b").text(currentQuestion.answer_b);
        $("#btn_answer_c").text(currentQuestion.answer_c);
        $("#btn_answer_d").text(currentQuestion.answer_d);
        currentQuestionNo = currentQuestionNo + 1;
    }
}

function getCountQuestions() {
    length = questions.length;
    return length;
}

function getMaxPoints() {
    maxPoints = getCountQuestions() * rightAnswerPoints;
    return maxPoints;
}