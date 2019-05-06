"use strict";

function addContact() {
    // Get field values
    var data = getContactData();

    // Store them
    storeContactData(data);
};

window.addEventListener("DOMContentLoaded", function() {
    var contactForm = document.querySelector("#add-contact");
    contactForm.addEventListener("submit", function(event) {
        addContact();
        // redirect to settings page
        window.location = 'settings.html';
        event.preventDefault();
        event.stopPropagation();
    });
});

function getContactData() {

    var x = document.forms.contactForm;
    var name = x.Name.value;
    var telephone = x.PhoneNumber.value;
    var data = {
        name : name,
        telephone : telephone
    };
    return data;
}

function storeContactData(data) {

    // get the list
    var emergencyContacts = localStorage.getItem("emergencyContacts");
    if(emergencyContacts === null){
        emergencyContacts = [];
    }
    else{
        emergencyContacts = JSON.parse(emergencyContacts);
    }
    // add data to list
    emergencyContacts.push(data);
    // store list
    emergencyContacts = JSON.stringify(emergencyContacts);
    localStorage.setItem("emergencyContacts", emergencyContacts);
}

// Get the values of those two fields
// Save them to localstorage
// redirect back to settings page
