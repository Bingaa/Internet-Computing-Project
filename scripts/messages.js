window.onload = function(){ 
    //Make messages scroll to bottom
    document.getElementById("messageSection").scrollTop = document.getElementById("messageSection").scrollHeight; 

    //Make message appear in chat 
    var input = document.getElementById("chatInput");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13 && document.getElementById("chatInput").value) {
            var div = document.createElement("div");
            div.setAttribute("class", "sent"); 
            var message = document.createElement("p"); 
            div.setAttribute("title", getTime()); 
            div.appendChild(message);
            var text = document.createElement("span"); 
            text.innerHTML = document.getElementById("chatInput").value; 
            message.appendChild(text); 
            document.getElementById("messageSection").appendChild(div);
            document.getElementById("chatInput").value = "";
            //Make messages scroll to bottom
            document.getElementById("messageSection").scrollTop = document.getElementById("messageSection").scrollHeight; 
        }
    });

    //Make emojis show up when smiley face is clicked
    var emoji = document.getElementById("emojiButton");
    var modal = document.getElementById('myModal');
    emoji.onclick = function(){ 
        modal.style.display = "block";
    }

    //Click event for emoji to show up on input
    var emojiContainer = document.getElementById("emojiContent").querySelectorAll("span");
    for (let i = 0; i < emojiContainer.length; i++) {
        emojiContainer[i].onclick = function(){ 
            document.getElementById("chatInput").value += emojiContainer[i].innerHTML;
        }   
    }

    //Make new message div show up when message button clicked 
    var newMessageButton = document.getElementById("newMessage");
    var modalMessage = document.getElementById('myModalMessage');
    newMessageButton.onclick = function(){ 
        modalMessage.style.display = "block";
    }

    //Make modals disappear
    window.onclick = function(event) {
        if (event.target == modalMessage) {
            modalMessage.style.display = "none";
        }
        if (event.target == modal) {
            modal.style.display = "none";
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
        var img = document.createElement("img")
        img.setAttribute("src",  getImagePath );
        var div = document.createElement("div"); 
        div.setAttribute("class", "sent"); 
        div.appendChild(img); 
        document.getElementById("messageSection").appendChild(div);
        imageFileInput.value = "";
        //Make messages scroll to bottom
        document.getElementById("messageSection").scrollTop = document.getElementById("messageSection").scrollHeight; 
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

