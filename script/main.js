var categoryArray;

$(document).ready(function () {
    dropDownResize();

    //get the hidden select values which allow our php array to be transfered to javascript
    if ($("#category-array").length != 0) {
        categoryArray = document.getElementById('category-array').options;
    }
});

$(window).resize(function () {
    dropDownResize();
});

//update dropdown menu widths to match its related button / input
function dropDownResize() {
    if ($("#account-dropdown-menu").length != 0) {
        $("#account-dropdown-menu").width($("#account-dropdown-button").outerWidth());
    }

    if ($("#category-dropdown-menu").length != 0) {
        $("#category-dropdown-menu").width($("#category-search").outerWidth());
    }
}

function updateCategory(value) {
    $("#category-search").val(value);
}

function filterCategories(value) {
    for (i = 0; i < categoryArray.length; i++) {
        if (categoryArray[i].text.toLowerCase().includes(value.toLowerCase())) {
            $("#" + categoryArray[i].value).attr("tabindex", "-1");
            $("#" + categoryArray[i].value).attr("role", "menuitem");
            $("#" + categoryArray[i].value).addClass("dropdown-item");
            $("#" + categoryArray[i].value).show();
        }
        else {
            $("#" + categoryArray[i].value).removeAttr("tabindex");
            $("#" + categoryArray[i].value).removeAttr("role");
            $("#" + categoryArray[i].value).removeClass("dropdown-item");
            $("#" + categoryArray[i].value).hide();
        }
    }
}

function enterKeySelection(key, value) {
    if (key === "Enter") {
        $("#" + value).click();
    }
}

function displayFileName(value) {
    if (value != null) {
        $("#image-file-label").text(value);
    }
    else {
        $("#image-file-label").text("Select File");
    }
}

function validateAccountForm() {
    //ajax!!!!!! :D 
    return true;
}

function validateUploadForm() {
    return true;
}

function validateSignUp() {
    return true;
}

function validateLogin() {
    return true;
}

function validateContact() {
    return true;
}

function validateSearch() {
    return true;
}

function checkPasswords() {
    var password = $("#password-input").val();
    var passwordConfirm = $("#password-confirm").val();

    $("#password-input-hint").text("");
    $("#password-confirm-hint").text("");
    $("#password-input-hint").removeClass();
    $("#password-confirm-hint").removeClass();
    $("#password-input").removeClass("is-valid is-invalid");
    $("#password-confirm").removeClass("is-valid is-invalid");

    if (password != "" && passwordConfirm != "") {
        if (password == passwordConfirm) {
            $("#password-input-hint").text("Passwords Match");
            $("#password-confirm-hint").text("Passwords Match");
            $("#password-input-hint").addClass("valid-feedback");
            $("#password-confirm-hint").addClass("valid-feedback");
            $("#password-input").addClass("is-valid");
            $("#password-confirm").addClass("is-valid");
        }
        else {
            $("#password-input-hint").text("Passwords Dont Match");
            $("#password-confirm-hint").text("Passwords Dont Match");
            $("#password-input-hint").addClass("invalid-feedback");
            $("#password-confirm-hint").addClass("invalid-feedback");
            $("#password-input").addClass("is-invalid");
            $("#password-confirm").addClass("is-invalid");
        }
    }
}