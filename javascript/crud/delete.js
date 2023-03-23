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
