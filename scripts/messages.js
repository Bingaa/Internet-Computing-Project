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
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //Click event for emoji to show up on input
    var emojiContainer = document.getElementById("emojiContent").querySelectorAll("span");
    for (let i = 0; i < emojiContainer.length; i++) {
        emojiContainer[i].onclick = function(){ 
            document.getElementById("chatInput").value += emojiContainer[i].innerHTML;
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



}


