$(function () {


  $('#btn_sub').click(function () {
    $.post(
      'handle_login.php',
      $('#logindaten').serialize(),
      function (data) {
        if (data == 1) {
          $('main').load('home.php');
          loadHome();
          loadNavi();
          changePageTitle(txt_cat);
        } else {
          document.getElementById("txt_logError").style.visibility = "visible";
        }
      },
      'html'
    );

  });

  $('#btn_register').click(function () {
    $.post(
      'handle_registrierung.php',
      $('#anmeldedaten').serialize(),
      function (data) {
        if (data == 1) {
          $('main').load('login.html');

        } else {

          document.getElementById("txt_regError").style.visibility = "visible";
        }
      },
      'html'
    );

  });

});