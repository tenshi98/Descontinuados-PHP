$(function() {
    setupTips();
    setupErrors();
    blockButton();
});

function setupTips()
{

    // set up tip for each text input box so that when you click into it, the tip displays
    $("input[type=text],[type=password],[type=file],textarea").focus(function() {
        $(this).siblings(".tips").show();
        $(this).siblings(".error").html("").hide();
    });

    // when you click out of it, the tip disappears
    $("input[type=text],[type=password],[type=file],textarea").blur(function() {
        $(this).siblings(".tips").hide();
    });

}

function setupErrors()
{


    $("#Titulo").blur(function() {
        if (jQuery.trim(this.value) == "") {
            notOkay(this, "Por favor indiquenos el titulo para el aviso.");
        } else if (! /^[ñ\a-zA-Z0-9\s]+$/.test(this.value)) {
            notOkay(this, "Solo puedes usar letras, numeros y espacios.");
        } else
            itsOkay(this);
    });

    $("#Contenido").blur(function() {
        if (jQuery.trim(this.value) == "")
            notOkay(this, "Por favor escriba un contenido amplio para su aviso.");
        else
            itsOkay(this);
    });

    $("#Precio").blur(function() {
        if (jQuery.trim(this.value)) {
            if (! /^[\d]+$/.test(this.value)) {
                notOkay(this, "Por favor, solo numeros, sin punto ni guión.");
             }
        }
    });

  
}

function itsOkay(which)
{
    $(which).siblings(".ok").css("display","inline");
}

function notOkay(which, errorMsg)
{
    $(which).siblings(".ok").hide();
    $(which).siblings(".error").html(errorMsg).show();
}