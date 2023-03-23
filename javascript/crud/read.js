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
