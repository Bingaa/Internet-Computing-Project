
var searchContacts = function(searchString){ 
    var dummyContacts = []; 
    dummyContacts[0] = {name: "Alex Yang", userName: "kyuYang69", status: "having fun!"}; 
    dummyContacts[1] = {name: "Andrew Fong", userName: "fong69", status: "having fun!"}; 
    dummyContacts[2] = {name: "Davis Feeder", userName: "davis69", status: "Running it down botlane!"}; 

    $.get("../findContacts.php?searchString=" + searchString, function(response){ 
        let contacts = JSON.parse(response); 
        console.log(contacts);

        $('#contactList').empty('#foundContacts'); 
        $('#contactList').append('<table style="width:100%" id="foundContacts" class="contact-list"></table>');

        let table = document.getElementById("foundContacts");
        for(let i = 0; i < contacts.length; i++){ 
            var row = table.insertRow(-1); 
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = "<img class = 'profile-pic-icon' src = " + "../images/profiles/" + contacts[i].Image + ".jpg onerror=" + "this.src='../images/error.png'"+  ">";
            cell2.innerHTML = "<h3>" + contacts[i].FirstName + " " + contacts[i].LastName + "</h3> <p>" + contacts[i].Status + "</p>" ;
              
        }

    });

}
