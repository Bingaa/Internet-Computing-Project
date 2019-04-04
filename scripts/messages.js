window.onload = function(){ 

    let contactsCurrentGroup = []; 
    $("#searchContacts").keyup(function(){ 
        $.get("../searchContacts.php?searchString=" + $(this).val(), function(response){ 
            let contacts = JSON.parse(response); 
            console.log(contacts);
    
            $('#contactList').empty('#foundContacts'); 
            $('#contactList').append('<table style="width:100%" id="foundContacts" class="contact-list"></table>');
    
            let table = document.getElementById("foundContacts");
            for(let i = 0; i < contacts.length; i++){ 
                var row = table.insertRow(-1); 
                row.setAttribute('class', 'contactRow');
                row.setAttribute('id', i);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.innerHTML = "<img class = 'profile-pic-icon' src = " + "../images/" + contacts[i].Image + " onerror=" + "this.src='../images/error.png'"+  ">";
                cell2.innerHTML = "<p>" + contacts[i].FirstName + " " + contacts[i].LastName + "</p>" ;
            }
    
            $(".contactRow").click(function(){ 
                if(!contactsCurrentGroup.includes(contacts[$(this).attr("id")].ContactID)){ 
                    $("#to").append("<li >" + contacts[$(this).attr("id")].FirstName + " " + contacts[$(this).attr("id")].LastName + "<span id='" + contacts[$(this).attr("id")].ContactID + "' " + "class='close'>x</span></li>"); 
                    contactsCurrentGroup.push(contacts[$(this).attr("id")].ContactID);
                }
           
                /* Get all elements with class="close" */
                var closebtns = document.getElementsByClassName("close");
                var i;

                /* Loop through the elements, and hide the parent, when clicked on */
                for (i = 0; i < closebtns.length; i++) {
                    closebtns[i].addEventListener("click", function() {
                        this.parentElement.style.display = 'none';
                        let index = contactsCurrentGroup.indexOf(this.id);
                        contactsCurrentGroup.splice(index,1);
                    });
                }

                if(contactsCurrentGroup.length > 0){ 
                    $("#createMessageButton").css("display", "block");
                } else { 
                    $("#createMessageButton").css("display", "none");
                }

            });
    
        });
    
    });

    $("#createMessageButton").click(function(){ 
        $("#myModalMessage").css("display", "none");
        $.ajax({
            url:"../createMessageGroup.php",
            type:"post",
            data: {ids:contactsCurrentGroup},
            success:function(data){
                console.log(data); 
                location.reload(true); 
            },
            error: function() {
                alert("fail");
            }
        });
    });

    //Make messages scroll to bottom
    document.getElementById("messageSection").scrollTop = document.getElementById("messageSection").scrollHeight; 

    var sendMessage = function(input){ 
        var div = document.createElement("div");
        div.setAttribute("class", "sent"); 
        var message = document.createElement("p"); 
        div.setAttribute("title", getTime()); 
        div.appendChild(message);
        var text = document.createElement("span"); 
        text.innerHTML = input; 
        if(text.querySelectorAll("img").length != 0){ 
            text.classList.add("gif-span");
        } else { 
            text.classList.add("text-span");
        }
        message.appendChild(text); 
        document.getElementById("messageSection").appendChild(div);
        document.getElementById("chatInput").value = "";
        //Make messages scroll to bottom
        document.getElementById("messageSection").scrollTop = document.getElementById("messageSection").scrollHeight; 

        //store message in db 
        //need groupID and createDate
        $groupId = $('[name="activeMessageGroup"]').attr("id");
        $.post( "../sendMessage.php", { groupID: $groupId, content: text.innerHTML}, function(response){ 
            console.log(response);
        });

    }
    //Make message appear in chat 
    var input = document.getElementById("chatInput");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13 && document.getElementById("chatInput").value) {
            sendMessage(document.getElementById("chatInput").value);
        }
    });

    //Make emojis show up when smiley face is clicked
    var emoji = document.getElementById("emojiButton");
    var modal = document.getElementById('myModal');
    emoji.onclick = function(){ 
        modal.style.display = "block";
    }
    var gif = document.getElementById("sendGIFButton");
    var gifmodal = document.getElementById('gifModal');
    gif.onclick = function(){ 
        document.getElementById('gifModal').style.display = "block";
    }


    //Click event for emoji to show up on input
    var emojiContainer = document.getElementById("emojiContent").querySelectorAll("span");
    for (let i = 0; i < emojiContainer.length; i++) {
        emojiContainer[i].onclick = function(){ 
            document.getElementById("chatInput").value += emojiContainer[i].innerHTML;
        }   
    }

    //GIFs
    $("#gifInput").keyup(function(){ 
        var xhr = $.get("http://api.giphy.com/v1/gifs/search?q=" + $(this).val() +"&api_key=SmVqSeC7dggjzVNUL4qz8oSiDNad53P7&limit=30");
        xhr.done(function(response) { 
            console.log("success got data", response); 
            let embed = "";
            let gif;
            $("#listGifs").empty(); 
            for(let i = 0; i < response.data.length; i++){ 
                embed = response.data[i]["images"]["downsized"]["url"];
                gif = $("<img class='giffy' src='" + embed + "' width='285' height = '250' ></img>");
                gif.click(function(){ 
                    sendMessage("<img class='giffy' src='" + $(this).attr("src") + "' width='285' height = '250' ></img>");
                });
                $("#listGifs").append(gif);
            }

            if(response.data.length == 0){ 
                $("#listGifs").append("<p class='no-gif'>No Matching GIFs Found </p>");
            }
        });

    });

    //send thumbsup
    $("#thumbsup").click(function(){ 
        sendMessage("👍");
    });
    //Make new message div show up when message button clicked 
    var newMessageButton = document.getElementById("newMessage");
    var modalMessage = document.getElementById('myModalMessage');
    newMessageButton.onclick = function(){ 
        modalMessage.style.display = "block";
    }

    $("#send").click(function(){ 
        sendMessage(document.getElementById("chatInput").value);
    });

    //Make modals disappear
    window.onmousedown = function(event) {
        if (event.target == modalMessage) {
            modalMessage.style.display = "none";
        }
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == gifmodal) {
            gifmodal.style.display = "none";
        }
    }

    //Click event for sending a picture
    var sendImageButton = document.getElementById("sendImageButton"); 
    var imageFileInput = document.getElementById("imageFile"); 
    sendImageButton.onclick = function(){ 
        imageFileInput.click();
    }
    imageFileInput.onchange = function(event){ 
        var getImagePath = URL.createObjectURL(event.target.files[0]);
        var fileData = new FormData(); 
        fileData.append("file", $('#imageFile').prop('files')[0]);
        fileData.append("groupID",$('[name="activeMessageGroup"]').attr("id"));
        var img = document.createElement("img");
        img.setAttribute("src",  getImagePath );
        var div = document.createElement("div"); 
        div.setAttribute("class", "sent"); 
        div.appendChild(img); 
        document.getElementById("messageSection").appendChild(div);
        imageFileInput.value = "";
        //Make messages scroll to bottom
        document.getElementById("messageSection").scrollTop = document.getElementById("messageSection").scrollHeight; 

        $.ajax({
            url: "../sendMessage.php",
            type: "POST",
            data: fileData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                console.log(data);
            }
        });
    }

    //function to get current Time
    var getTime = function(){ 
        let date, time, hour, minute, dayOrNight, day, month, Months,  year; 
        Months = {
            0: "January", 
            1: "February", 
            2: "March", 
            3: "April", 
            4: "May", 
            5: "June", 
            6: "July", 
            7: "August", 
            8: "September", 
            9: "October", 
            10: "November", 
            11: "December"
        };
        date = new Date(); 
        year = date.getFullYear(); 
        month = Months[date.getMonth()]; 
        day = date.getDate(); 
        hour = date.getHours(); 
        minute = ( '0' + date.getMinutes()).substr(-2); 
        dayOrNight = "AM";
        if(hour > 12){ 
            hour = hour -12; 
            dayOrNight = "PM"; 
        } else if (hour == 0){ 
            hour = 12; 
        }
        
        time = month + " " + day +  ", " + year + " " + hour + ":" + minute+ " " + dayOrNight;
        
        return time; 
    }

     

}

let messageTime = "";
let currentSender = 0; 
var loadMessages = function(result){ 
    let div; 
    for(let i = 0; i < result.length; i++){
        //change class based on sender
        if(result[i][4] != result[i][2]){ 
            div = $("<div class='received' title='" + result[i][1] +  "'> </div>");
        } else { 
            div = $("<div class='sent' title='" + result[i][1] +  "'> </div>");
        }
        //add small text indicating who sender of message is if previously it was someone else
        if(currentSender != result[i][2] ){ 
            div.append("<p class='sendername'>" + result[i][3] + "</p>");
            currentSender = result[i][2];
        }
        if(result[i][5] == "Img"){ 
            div.append("<img src='" + result[i][6] + "'>");
        } else { 
            if(result[i][0].includes('<img class=')){ 
                div.append("<p> <span class=\"gif-span\">" + result[i][0] +"</span></p>");
                console.log("here");
            } else { 
                div.append("<p> <span class=\"text-span\">" + result[i][0] +"</span></p>");
            }
        }

        $("img").on("error", function(){ 
            $(this).attr("src","../images/error.png");
        })
        $("#messageSection").append(div);
        
    }
    if(result[result.length-1] && result[result.length-1][1] ){ 
        messageTime = result[result.length-1][1];
        document.getElementById("messageSection").scrollTop = document.getElementById("messageSection").scrollHeight;
    }
}

$(document).ready(function(){ //AJAX messages requesting
    $(".chatSel").click(function(event){
        $(".chatSel").css("background-color", "white");
        $(".chatSel").attr("name", "");
        $(this).css("background-color", "#e6e6e6");
        $(this).attr("name", "activeMessageGroup");
        $(".message-section-header").empty(); 
        $(".message-section-header").append("<h3>" + $(this).find("#name").text() + "</h3>" );
        var request = $.ajax({
            type:"GET",
            url: "../scripts/messageRequest.php",
            data:{input:$(this).attr("id")},
            dataType:'JSON',
        });
        request.done(function(result){
        //Select Element by ID
        //Parse JSON and insert into chat-based on whether is received or sent
        $('#messageSection').empty();
        loadMessages(result);
        //make so if new message in chat automatically chat div scrolls to bottom 
 
        document.getElementById("messageSection").scrollTop = document.getElementById("messageSection").scrollHeight; 
        
        if(result[result.length - 1]){ 
        messageTime = result[result.length-1][1];
        }
        });
        request.fail(function(jqXHR,textStatus){
        //
        alert("Messages could not be found");
        });

      
    });

    $(".chatSel").first().trigger('click');

    var updateMsg = function(){ 
        //$('[name="activeMessageGroup"]').trigger('click');
        var request = $.get("../scripts/messageRequest.php?input=" + $('[name="activeMessageGroup"]').attr("id") + "&time='" + messageTime + "'");
        request.done(function(result){
            result = JSON.parse(result);
            loadMessages(result);
        });

    }; 
    setInterval(updateMsg,500);
});