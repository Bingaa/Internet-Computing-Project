
$(document).ready(function(){
    $("#forgot").click(function(){

      var request = $.ajax({
        type:"GET",
        url: "../scripts/passwordReset.php",
        data:{input:$("#info").val()},
        dataType:'text',
      });
      request.done(function(result){
        appended="We sent you an email to "+result+".  Check it out!";
        $("#blurb").html(appended);
      });
      request.fail(function(jqXHR,textStatus){
        appended="We were unable to find your information in the database.  Check if you mispelled something!";
        $("#blurb").html(textStatus);
      });
    });

    $('#info').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){

        var request = $.ajax({
          type:"GET",
          url: "../scripts/passwordReset.php",
          data:{input:$("#info").val()},
          dataType:'text',
        });
        request.done(function(result){
          appended="We sent you an email to "+result+".  Check it out!";
          $("#blurb").html(appended);
        });
        request.fail(function(jqXHR,textStatus){
          appended="We were unable to find your information in the database.  Check if you mispelled something!";
          $("#blurb").html(textStatus);
        });
      }
  });
});