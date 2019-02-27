
var searchContacts = function(searchString){ 
    var dummyContacts = []; 
    dummyContacts[0] = {name: "Alex Yang", userName: "kyuYang69", status: "having fun!"}; 
    for(let i = 0; i < dummyContacts.length; i++){ 
        if(dummyContacts[i].name.includes(searchString) || dummyContacts[i].userName.includes(searchString)){ 
            console.log(dummyContacts[i].name); 
        }
    }
}