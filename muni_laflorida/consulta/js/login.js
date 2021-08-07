// Login Form

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});


$(function() {
    var button = $('#loginButtonSocial');
    var box = $('#loginBoxSocial');
    var form = $('#loginFormSocial');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonSocial').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});

$(function() {
    var button = $('#loginButtonPatCom');
    var box = $('#loginBoxPatCom');
    var form = $('#loginFormPatCom');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonPatCom').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
$(function() {
    var button = $('#loginButtonPerCirc');
    var box = $('#loginBoxPerCirc');
    var form = $('#loginFormPerCirc');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonPerCirc').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
$(function() {
    var button = $('#loginButtonLicCond');
    var box = $('#loginBoxLicCond');
    var form = $('#loginFormLicCond');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonLicCond').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
$(function() {
    var button = $('#loginButtonAseo');
    var box = $('#loginBoxAseo');
    var form = $('#loginFormAseo');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonAseo').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
$(function() {
    var button = $('#loginButtonCertObras');
    var box = $('#loginBoxCertObras');
    var form = $('#loginFormCertObras');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonCertObras').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
$(function() {
    var button = $('#loginButtonInspeccion');
    var box = $('#loginBoxInspeccion');
    var form = $('#loginFormInspeccion');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonInspeccion').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
$(function() {
    var button = $('#loginButtonPermProv');
    var box = $('#loginBoxPermProv');
    var form = $('#loginFormPermProv');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonPermProv').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});
$(function() {
    var button = $('#loginButtonTesoreria');
    var box = $('#loginBoxTesoreria');
    var form = $('#loginFormTesoreria');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButtonTesoreria').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});