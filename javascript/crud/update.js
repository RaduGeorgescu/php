//populate update form
$(document).on("click", "#update", function () {
    $.ajax({
        url: "modules/users/readOne.php",
        type: "POST",
        data: {
            id: id,
        },
        success: function (response) {
            const data = JSON.parse(response);
            console.log(data);
            $("#age").val(data.Age);
            $("#name").val(data.Name);
            $("#office").val(data.Office);
            $("#salary").val(data.Salary);
            $("#position").val(data.Position);
            $("#startdate").val(data.Startdate.date.split(" ")[0]);
        },
        error: function (xhr, status, error) {
            alert("Error adding:" + error);
        },
    });
});

//update in db
$("#updateButton").click(function (e) {
    e.preventDefault();
    const form = $("#updateForm");
    const formData = form.serializeArray();
    formData.push({ name: "id", value: id });
    const json = JSON.stringify(formData);
    console.log(json);
    $.ajax({
        url: "modules/users/update.php",
        type: "PUT",
        data: json,
        success: function (response) {
            console.log(response);
            $("#updateButton").append(
                '<div class="alert alert-success" role="alert">User updated successfully!</div>'
            );
            location.reload();
        },
        error: function (xhr, status, error) {
            console.error(error);
            $("#updateButton").append(
                `<div class="alert alert-danger" role="alert">Something went wrong: ${error}</div>`
            );
        },
    });
});
