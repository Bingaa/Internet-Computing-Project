
$(document).ready(function(){
    $("#forgot").click(function(){
      var request = $.ajax({
        type:"GET",
        url: "../scripts/passwordReset.php",
        data:{input:"andrew69"}, //$("#info").value
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
});