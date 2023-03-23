//create
$("#createButton").click(function (event) {
    //changed form from employee-form to form
    event.preventDefault();
    const form = $("#createForm");
    const seri = form.serialize();
    const json = JSON.stringify(seri);
    $.ajax({
        type: "POST",
        url: "modules/users/insert.php",
        data: form.serialize(), // serialize form data into an
        success: function (response) {
            $("#button").append(
                '<div class="alert alert-success" role="alert"> user updates succesfully!</div>'
            );
            location.reload("/test");
        },
        error: function (xhr, status, error) {
            $("#button").append(
                `<div class="alert alert-danger" role="alert"> Something Went Wrong: ${error}</div>`
            );
        },
    });
});
