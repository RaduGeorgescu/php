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
