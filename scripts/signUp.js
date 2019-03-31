$(document).ready(function () {



    $("#signUpForm").submit(function(e){ 
        e.preventDefault(); 
        if(
            $('#check-email').css('display') == 'block' &&
            $('#check-username').css('display') == 'block' &&
            $('#check-firstname').css('display') == 'block' &&
            $('#check-lastname').css('display') == 'block' &&
            $('#check-password').css('display') == 'block' &&
            $('#check-password2').css('display') == 'block'
        ){ 
            $.get("../newUserSignUp.php", {
                userName: $("#userName").val(), 
                password: $('#password').val(), 
                email: $('#email').val(), 
                firstName: $('#firstName').val(), 
                lastName: $('#lastName').val()
            }, function(response){ 
                if(response){ 
                    window.location.href = "../html/profile.php";
                } 
            });
        }
    })

    $('#email').keyup(function(){ 
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        if(emailReg.test($(this).val())){ 
            $('#check-email').css('display','block'); 
        } else { 
            $('#check-email').css('display','none'); 
        }
    });

    $('#userName').keyup(function(){ 
        $.get("../checkUserName.php?username=" + $(this).val(), function(response){ 
            if(response == "" && $('#userName').val() != ""){ 
                $('#check-username').css('display','block'); 
            } else { 
                $('#check-username').css('display','none'); 
            }
        });
    });

    $('#firstName').keyup(function(){ 
        if($(this).val() != ""){ 
            $('#check-firstname').css('display','block'); 
        } else { 
            $('#check-firstname').css('display','none'); 
        }
    });

    $('#lastName').keyup(function(){ 
        if($(this).val() != ""){ 
            $('#check-lastname').css('display','block'); 
        } else { 
            $('#check-lastname').css('display','none'); 
        }
    });

    $('#password').keyup(function(){ 
        if($(this).val().length > 7 && $(this).val() == $('#password2').val()){ 
            $('#check-password').css('display','block'); 
            $('#check-password2').css('display','block'); 
        } else { 
            $('#check-password').css('display','none'); 
            $('#check-password2').css('display','none'); 
        }
    });

    $('#password2').keyup(function(){ 
        if($(this).val().length > 7 && $(this).val() == $('#password').val()){ 
            $('#check-password').css('display','block'); 
            $('#check-password2').css('display','block'); 
        } else { 
            $('#check-password').css('display','none'); 
            $('#check-password2').css('display','none'); 
        }
    });
    
});
