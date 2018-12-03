var categoryArray;

$(document).ready(function () {
    //set the dropdown widths on page load
    dropDownResize();

    //get the hidden select values which allow our php array to be transfered to javascript
    if ($("#category-array").length != 0) {
        categoryArray = document.getElementById('category-array').options;
    }
});

//when the window is resized, update the dropdown widths
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

//update the text input when a dropdown entry is clicked
function updateCategory(value) {
    $("#category-search").val(value);
}

//filter the custom dropdown with any entries that match the inputted text
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

//used for the custom bootstrap text + dropdown input
function enterKeySelection(key, value) {
    if (key === "Enter") {
        $("#" + value).click();
    }
}

//any file select will call this to display the selected file
function displayFileName(value, id) {
    //console.log(id);
    if (value != null) {
        var fileName = value.slice(value.lastIndexOf("\\") + 1, value.length)
        $("#" + id).text(fileName);
    }
    else {
        $("#" + id).text("Select File");
    }
}

function validateAccountForm() {
    $.when(accountAjaxCall())
        .done(function (result) {
            console.log(result);
            return false;
        });

    return false;
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

function validateContact(form) {
    $.when(contactAjaxCall())
        .done(function (result) {
            //console.log(result);

            if (result["email"] && result["message"] && result["type"]) {
                form.submit();
            }
            else {
                $("#email-contact").removeClass("is-valid is-invalid");
                $("#email-contact-hint").removeClass("valid-feedback invalid-feedback");
                $("#email-contact-hint").text("");

                $("#message-contact").removeClass("is-valid is-invalid");
                $("#message-contact-hint").removeClass("valid-feedback invalid-feedback");
                $("#message-contact-hint").text("");

                if (result["email"]) {
                    $("#email-contact").addClass("is-valid");
                    $("#email-contact-hint").addClass("valid-feedback");
                    $("#email-contact-hint").text("Email Address is Valid");
                }
                else {
                    $("#email-contact").addClass("is-invalid");
                    $("#email-contact-hint").addClass("invalid-feedback");
                    $("#email-contact-hint").text("Not a Valid Email Address");
                }

                if (result["message"]) {
                    $("#message-contact").addClass("is-valid");
                    $("#message-contact-hint").addClass("valid-feedback");
                }
                else {
                    $("#message-contact").addClass("is-invalid");
                    $("#message-contact-hint").addClass("invalid-feedback");
                    $("#message-contact-hint").text("Required");
                }

                return false;
            }
        });

    return false;
}

function contactAjaxCall() {
    return $.ajax({
        url: "../php/authenticate_contact.php",
        type: "POST",
        dataType: "json",
        data: {
            "email": $("#email-contact").val(),
            "message": $("#message-contact").val(),
            "type": $("input:radio[name ='type']:checked").val()
        },
        error: function (event, jqxhr, settings, thrownError) {
            console.log(event + " | " + jqxhr + " | " + settings + " | " + thrownError);
        }
    });
}

function accountAjaxCall() {
    //when dealing with files, need to use FormData 
    var formData = new FormData();
    formData.append("name", $("#name-input").val());
    formData.append("password", $("#password-input").val());
    formData.append("password-confirm", $("#password-confirm").val());
    formData.append('avatar', $('input[type=file]')[0].files[0]);

    return $.ajax({
        url: "../php/authenticate_account.php",
        type: "POST",
        dataType: "json",
        data: formData,
        type: 'POST',
        contentType: false,
        processData: false,
        error: function (event, jqxhr, settings, thrownError) {
            console.log(event + " | " + jqxhr + " | " + settings + " | " + thrownError);
        }
    });
}

function validateSearch() {
    return true;
}

function checkPasswords() {
    var password = $("#password-input").val();
    var passwordConfirm = $("#password-confirm").val();

    $("#password-input").removeClass("is-valid is-invalid");
    $("#password-confirm").removeClass("is-valid is-invalid");

    $("#password-input-hint").removeClass("valid-feedback invalid-feedback");
    $("#password-confirm-hint").removeClass("valid-feedback invalid-feedback");
    $("#password-input-hint").text("");
    $("#password-confirm-hint").text("");

    if (password != "" && passwordConfirm != "") {
        if (password === passwordConfirm) {
            $("#password-input").addClass("is-valid");
            $("#password-confirm").addClass("is-valid");

            $("#password-input-hint").addClass("valid-feedback");
            $("#password-confirm-hint").addClass("valid-feedback");
            $("#password-input-hint").text("Passwords Match");
            $("#password-confirm-hint").text("Passwords Match");

            return true;
        }
        else {
            $("#password-input").addClass("is-invalid");
            $("#password-confirm").addClass("is-invalid");

            $("#password-input-hint").addClass("invalid-feedback");
            $("#password-confirm-hint").addClass("invalid-feedback");
            $("#password-input-hint").text("Passwords Dont Match");
            $("#password-confirm-hint").text("Passwords Dont Match");

            return false;
        }
    }
}