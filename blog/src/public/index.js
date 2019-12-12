$(document).ready(function(){
    // bg option
    $("#password").on('input', () => {
        var verif = $("#password_verif").val();
        console.log(verif, $("#password").val());

        if (verif != $("#password").val()) {
            $("#submit_pwd").attr("disabled", true);
            $(".pass_match").show();
        } else {
            $("#submit_pwd").attr("disabled", false);
            $(".pass_match").hide();
        }
    });

    $("#password_verif").on('input', () => {
        var pass = $("#password").val();

        if (pass != $("#password_verif").val()) {
            $("#submit_pwd").attr("disabled", true);
            $(".pass_match").show();
        } else {
            $("#submit_pwd").attr("disabled", false);
            $(".pass_match").hide();
        }
    });
});