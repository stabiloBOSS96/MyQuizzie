var txt_standard_begrueßung = "Willkommen bei MyQuizzie";
var txt_anmelden = "Melde dich an!";
var txt_cat = "Wähle dein Quizzie!";
var txt_error_noQuizname = "Bitte vergib deinem Quiz einen Namen";
var txt_error_questiontable = "Überprüfe deine Fragen";
var txt_error_alg = "Überprüfe deine Angaben";
var txt_create_quiz = "Erstelle dein eigenes MyQuizz";
var txt_create_category = "Erstelle eine Kategorie";
var txt_myquizzes = "Meine Spiele";
var txt_stats = "Statistiken";


$(function () {
    $.ajaxSetup({
        cache: false
    });
    $('main').load('home.php');
    loadHome();
    loadNavi();
});

function loadNavi() {
    $('nav').load('nav.php', function () {
        $('#nav_home').click(function () {
            $('main').load('home.php');
            $('a.active').removeClass('active');
            $(this).addClass('active');
            changePageTitle(txt_standard_begrueßung);
        });
        $('#nav_logout').click(function () {
            $('main').load('home.php');
            $('a.active').removeClass('active');
            $(this).addClass('active');
            handleLogout();
            loadHome();
            changePageTitle(txt_standard_begrueßung);
        });
        $('#nav_login').click(function () {
            $('main').load('login.html');
            $('a.active').removeClass('active');
            $(this).addClass('active');
            changePageTitle(txt_anmelden);
        });
        $('#nav_create_quiz').click(function () {
            $('main').load('category.php');
            $('a.active').removeClass('active');
            $(this).addClass('active');
            changePageTitle(txt_cat);
        });
        $('#nav_myquizzes').click(function () {
            $('main').load('myquizzes.php');
            $('a.active').removeClass('active');
            $(this).addClass('active');
            changePageTitle(txt_myquizzes);
        });
        $('#nav_stats').click(function () {
            $('main').load('statistik.php');
            $('a.active').removeClass('active');
            $(this).addClass('active');
            changePageTitle(txt_stats);
        });
    });
}

function changeInfoMsg(type, msg) {
    if ($("#txt_container_error").hasClass("mdl-color-text--red")) {
        $("#txt_container_error").removeClass("mdl-color-text--red");
    }
    if ($("#txt_container_error").hasClass("mdl-color-text--green")) {
        $("#txt_container_error").removeClass("mdl-color-text--green");
    }


    if (type.localeCompare("error") == 0) {
        $("#txt_container_error").addClass(" mdl-color-text--red");
    }
    if (type.localeCompare("success") == 0) {
        $("#txt_container_error").addClass(" mdl-color-text--green");
    }
    document.getElementById("txt_error").innerHTML = msg;
    document.getElementById("txt_container_error").style.visibility = "visible";
}


function loadHome() {
    $('#header2').load('header.php');
}

function changePageTitle(title) {
    $('#page_title').html(title);
}

function handleLogout() {
    $.post(
        'handle_logout.php?',
        {},
        function (data) {
            $('main').load('home.php');
            loadNavi();
            loadHome();
        },
        'html'
    );
}
