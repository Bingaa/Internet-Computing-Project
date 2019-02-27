
var searchContacts = function(searchString){ 
    var dummyContacts = []; 
    dummyContacts[0] = {name: "Alex Yang", userName: "kyuYang69", status: "having fun!"}; 
    dummyContacts[1] = {name: "Andrew Fong", userName: "fong69", status: "having fun!"}; 
    dummyContacts[2] = {name: "Davis Feeder", userName: "davis69", status: "Running it down botlane!"}; 

    var table = document.getElementById("foundContacts"); 
    for(var i = table.rows.length - 1; i >= 0; i--)
    {
        table.deleteRow(i);
    }
    for(let i = 0; i < dummyContacts.length; i++){ 
        if(dummyContacts[i].name.toLowerCase().includes(searchString.toLowerCase())){ 
            console.log(dummyContacts[i].name); 
            var row = table.insertRow(-1); 
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = "<img class = 'profile-pic-icon' src = " + "../images/profiles/" + dummyContacts[i].userName + ".jpg>";
            cell2.innerHTML = "<h3>" + dummyContacts[i].name + "</h3> <p>" + dummyContacts[i].status + "</p>" ;
          }
    }
}
