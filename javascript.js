$(document).ready(function () {
    //gets the data, popoulates the table with the data
    var table = $("#myTable").DataTable({
        dom: "Bfrtip",

        //make create button
        buttons: [
            {
                text: "Create",
                attr: {
                    "data-bs-toggle": " modal",
                    "data-bs-target": "#createModal",
                },
                init: function (api, node, config) {
                    $(node).removeClass("dt-button");
                    $(node).addClass("btn btn-primary");
                },
                action: function () {
                    $("#createModal").modal("show");
                },
            },
        ],

        //request to get the data
        ajax: {
            url: "modules/users/read.php",
            dataSrc: "", //left empty because we receive an array
        },

        //create the columns of the table
        columns: [
            {
                data: "ID",
            },
            {
                data: "Name",
            },
            {
                data: "Position",
            },
            {
                data: "Office",
            },
            {
                data: "Age",
            },
            {
                data: "Startdate.date",
                render: function (data) {
                    //"<td data-sort='YYYYMMDD'>" + data + "</td>";
                    return new Date(data).toLocaleDateString("en-GB");
                },
            },
            {
                data: "Salary",
            },
            //creates delete and update buttons on routes
            {
                data: null,
                render: function (data, type, row, meta) {
                    return (
                        "<form action='update.php' method='post'>" +
                        "<button type='submit' id='update' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#updateModal'>update</button>" +
                        "</form>" +
                        "<form action='delete'>" +
                        "<button type='submit' id='delete' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal'>delete</button>" +
                        "</form>"
                    );
                },
            },
            {
                data: null,
                render: function (data, type, row, meta) {
                    return (
                        "<form action='details.php' method='post' id='details'>" +
                        "<button type='button' class='btn btn-primary' id='detail' data-bs-toggle='modal' data-bs-target='#detailModal'>details</button>" +
                        "</form>"
                    );
                },
            },
        ],
    });

    let ageMin = $("#ageMin");
    let ageMax = $("#ageMax");
    // Custom range filtering function
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        let min = parseInt(ageMin.val(), 10);
        let max = parseInt(ageMax.val(), 10);
        let age = parseFloat(data[4]) || 4; // use data for the age column

        if (
            (isNaN(min) && isNaN(max)) ||
            (isNaN(min) && age <= max) ||
            (min <= age && isNaN(max)) ||
            (min <= age && age <= max)
        ) {
            return true;
        }

        return false;
    });

    ageMin.on("input", function () {
        table.draw();
    });
    ageMax.on("input", function () {
        table.draw();
    });

    let idMin = $("#idMin");
    let idMax = $("#idMax");

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        let min = parseInt(idMin.val(), 10);
        let max = parseInt(idMax.val(), 10);
        let id = parseFloat(data[0]) || 0; // use data for the age column

        if (
            (isNaN(min) && isNaN(max)) ||
            (isNaN(min) && id <= max) ||
            (min <= id && isNaN(max)) ||
            (min <= id && id <= max)
        ) {
            return true;
        }

        return false;
    });

    idMin.on("input", function () {
        table.draw();
    });
    idMax.on("input", function () {
        table.draw();
    });

    let salaryMin = $("#salaryMin");
    let salaryMax = $("#salaryMax");

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        let min = parseInt(salaryMin.val(), 10);
        let max = parseInt(salaryMax.val(), 10);
        let salary = parseFloat(data[6]) || 6; // use data for the age column

        if (
            (isNaN(min) && isNaN(max)) ||
            (isNaN(min) && salary <= max) ||
            (min <= salary && isNaN(max)) ||
            (min <= salary && salary <= max)
        ) {
            return true;
        }

        return false;
    });

    salaryMin.on("input", function () {
        table.draw();
    });
    salaryMax.on("input", function () {
        table.draw();
    });

    $("#clear-filter").on("click", function () {
        // clear all input fields
        $('input[type="text"], input[type="number"], input[type="date"]').val(
            ""
        );
        table.draw();
    });

    let dateMin = $("#dateMin");
    let dateMax = $("#dateMax");

    // Custom filtering function which will search data in column four between two dates
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        let min = dateMin.val();
        let max = dateMax.val();
        let date = data[5]; // use data for the date column

        date = new Date(date.split("/").reverse().join("-"));

        if (
            (min === "" && max === "") || // empty inputs return all data
            (min === "" &&
                date <= new Date(max.split("/").reverse().join("-"))) ||
            (min <= date && max === "") ||
            (min <= date &&
                date <= new Date(max.split("/").reverse().join("-")))
        ) {
            return true;
        }

        return false;
    });

    dateMin.on("input", function () {
        table.draw();
    });
    dateMax.on("input", function () {
        table.draw();
    });
});

//id
var id;

$(document).on("click", "#myTable button", function (event) {
    event.preventDefault();
    //gets the row and the if of the row where the button was clicked
    const row = $(this).closest("tr");
    id = row.find("td:first-child").text();
});

//populate details
$(document).on("click", "#detail", function () {
    // console.log('hello', id);
    $.ajax({
        url: "modules/users/readOne.php",
        type: "POST",
        data: {
            id: id,
        },
        success: function (response) {
            //recieves the data back of the element with that id and puts it into forms
            const data = JSON.parse(response);
            console.log(data);
            //goes over each item in data and creates an element composed of label and input based on what it recieves
            jQuery.each(data, (i, elemnt) => {
                try {
                    if (i === "Startdate") {
                        const date = elemnt.date.split(" ")[0];
                        $("#detailModalBody").append(
                            `<label for='${i}'>Start Date (dd-mm-yyyy):</label><input readonly type="date" id='${elemnt}' name='${elemnt}' value='${date}' required /> <br />`
                        );
                    } else if (elemnt === null) {
                        return true;
                    } else {
                        $("#detailModalBody").append(
                            `<label for='${i}'>${i}:</label><input readonly class="form-control" id='${elemnt}' name='${elemnt}' value='${elemnt}'/>`
                        );
                    }
                } catch (error) {
                    $("#detailModalBody").append(
                        `<div class="alert alert-danger" role="alert"> Something Went Wrong: ${error}</div>`
                    );
                    alert("Error adding:" + error);
                }
            });
        },
        error: function (xhr, status, error) {
            $("body").append(
                `<div class="alert alert-danger" role="alert"> Something Went Wrong: ${error}</div>`
            );
        },
    });
});

//empty details
$(document).on("click", function (event) {
    // check if the clicked element is not a descendant of the modal or is the close button
    if (
        !$(event.target).closest("#detailModal").length ||
        $(event.target).is("#detailCloseButton")
    ) {
        $("#detailModalBody").empty();
    }
});

//delete from db
$("#deleteModal").on("click", ".modal-footer button", function () {
    if ($(this).text() === "Yes") {
        $.ajax({
            url: "modules/users/delete.php",
            type: "GET",
            data: {
                id: id,
            },
            success: function (response) {
                // Show success message
                alert("user deleted succesfully");
                $("#deleteModal").on("hidden.bs.modal", function () {
                    location.reload();
                });
                $("#deleteModal").modal("hide");
            },
            error: function (xhr, status, error) {
                alert("Error in deleting your user: ", error);
            },
        });
    }
});

//populate update form
$(document).on("click", "#update", function () {
    // populateForm(id);
    $.ajax({
        url: "modules/users/readOne.php",
        type: "POST",
        data: {
            id: id,
        },
        success: function (response) {
            //recieves the data back of the element with that id and puts it into forms
            const data = JSON.parse(response);
            console.log(data);
            document.getElementById("age").value = data.Age;
            document.getElementById("name").value = data.Name;
            document.getElementById("office").value = data.Office;
            document.getElementById("salary").value = data.Salary;
            document.getElementById("position").value = data.Position;
            document.getElementById("startdate").value =
                data.Startdate.date.split(" ")[0]; //keeps only the date, removes the time
        },
        error: function (xhr, status, error) {
            alert("Error adding:" + error);
        },
    });
});

//update in db
$("#updateButton").click(function (e) {
    e.preventDefault(); // prevent the default form submit behavior
    const form = $("#updateForm");
    const formData = form.serializeArray(); // get form data as an array
    formData.push({ name: "id", value: id }); // add the ID value to the form data
    const json = JSON.stringify(formData); // convert the form data to JSON
    console.log(json); // print the JSON to the console for debugging purposes
    $.ajax({
        url: "modules/users/update.php",
        type: "PUT", // use the PUT method for updating
        data: json,
        success: function (response) {
            console.log(response); // log the response from the server
            $("#updateButton").append(
                '<div class="alert alert-success" role="alert">User updated successfully!</div>'
            ); // show a success message
            location.reload();
        },
        error: function (xhr, status, error) {
            console.error(error); // log the error to the console
            $("#updateButton").append(
                `<div class="alert alert-danger" role="alert">Something went wrong: ${error}</div>`
            ); // show an error message
        },
    });
});

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
