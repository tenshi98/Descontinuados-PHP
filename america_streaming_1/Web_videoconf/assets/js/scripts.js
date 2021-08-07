
jQuery(document).ready(function() {

    /*
        Background slideshow
    */
    $.backstretch([
      "assets/img/backgrounds/1.jpg"
    , "assets/img/backgrounds/2.jpg"
    , "assets/img/backgrounds/3.jpg"
    ], {duration: 3000, fade: 750});

 
   
    /*
    $('.register form').submit(function(){
        $(this).find("label[for='Nombres']").html('Nombres');
        $(this).find("label[for='Apellidos']").html('Apellidos');
        $(this).find("label[for='usuario']").html('usuario');
        $(this).find("label[for='email']").html('email');
        $(this).find("label[for='password']").html('password');
        ////
        var Nombres = $(this).find('input#Nombres').val();
        var Apellidos = $(this).find('input#Apellidos').val();
        var usuario = $(this).find('input#usuario').val();
        var email = $(this).find('input#email').val();
        var password = $(this).find('input#password').val();
        if(Nombres == '') {
            $(this).find("label[for='Nombres']").append("<span style='display:none' class='red'> - Please enter your first name.</span>");
            $(this).find("label[for='Nombres'] span").fadeIn('medium');
            return false;
        }
        if(Apellidos == '') {
            $(this).find("label[for='Apellidos']").append("<span style='display:none' class='red'> - Please enter your last name.</span>");
            $(this).find("label[for='Apellidos'] span").fadeIn('medium');
            return false;
        }
        if(username == '') {
            $(this).find("label[for='username']").append("<span style='display:none' class='red'> - Please enter a valid username.</span>");
            $(this).find("label[for='username'] span").fadeIn('medium');
            return false;
        }
        if(email == '') {
            $(this).find("label[for='email']").append("<span style='display:none' class='red'> - Please enter a valid email.</span>");
            $(this).find("label[for='email'] span").fadeIn('medium');
            return false;
        }
        if(password == '') {
            $(this).find("label[for='password']").append("<span style='display:none' class='red'> - Please enter a valid password.</span>");
            $(this).find("label[for='password'] span").fadeIn('medium');
            return false;
        }
    });
*/

});


