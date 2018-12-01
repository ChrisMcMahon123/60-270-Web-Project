var categoryArray;

$(document).ready(function () {
    dropDownResize();

    //get the hidden select values which allow our php array to be transfered to javascript
    if ($("#category-array") != null) {
        categoryArray = document.getElementById('category-array').options;
    }
});

$(window).resize(function () {
    dropDownResize();
});

//update dropdown menu widths to match its related button / input
function dropDownResize() {
    if ($("#account-dropdown-menu") != null) {
        $("#account-dropdown-menu").width($("#account-dropdown-button").outerWidth());
    }

    if ($("#category-dropdown-menu") != null) {
        $("#category-dropdown-menu").width($("#category-search").outerWidth());
    }
}

function updateCategory(value) {
    $("#category-search").val(value);
}

function filterCategories(value) {
    for (i = 0; i < categoryArray.length; i++) {
        if (categoryArray[i].text.toLowerCase().includes(value.toLowerCase())) {
            $("#" + categoryArray[i].value).show();
        }
        else {
            $("#" + categoryArray[i].value).hide();
        }
    }
}