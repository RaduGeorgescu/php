//id
var id;

$(document).on("click", "#myTable button", function (event) {
    event.preventDefault();
    //gets the row and the if of the row where the button was clicked
    const row = $(this).closest("tr");
    id = row.find("td:first-child").text();
});
