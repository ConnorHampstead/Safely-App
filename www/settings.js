"use strict";

function setDisplayStyleOf(elementId, style) {
    document.getElementById(elementId).style.display = style;
}

function clearTableRows(table) {
    for(var i = table.rows.length - 1; i > 0; i--){
        table.deleteRow(i);
    }
}

function populateContactsTable(table, contacts) {

    clearTableRows(table);

    // For each item in 'contacts' add a new row to the table
    for(var i=0; i < contacts.length; i++){
        var row = document.createElement("TR");
        var col = document.createElement("TH");
        var col2 = document.createElement("TH");
        var getName = contacts[i].name;
        var getTelephone = contacts[i].telephone;
        var name = document.createTextNode(getName);
        var telephone = document.createTextNode(getTelephone);
        row.appendChild(col);
        row.appendChild(col2);
        col.appendChild(name);
        col2.appendChild(telephone);
        table.appendChild(row);
    }
}

function onSettingsLoaded() {
    var contacts = localStorage.getItem("emergencyContacts");
    var table;

    if(contacts !== null && contacts.length > 0) {
        setDisplayStyleOf("contacts-table", "table");
        setDisplayStyleOf("ErrorMessage", "none");
        table = document.querySelector("#contacts-table");
        populateContactsTable(table, JSON.parse(contacts));
    } else {
        setDisplayStyleOf("ErrorMessage", "block");
        setDisplayStyleOf("contacts-table", "none");
    }
}

function removeAll(){
    localStorage.clear();
    alert("Items removed!");
    onSettingsLoaded();
}

window.addEventListener('DOMContentLoaded', onSettingsLoaded);