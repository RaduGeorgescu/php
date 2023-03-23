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

    //from here on I want you to move all tho code under this comment in new files

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
