<!-- UPDATE -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="updateModalBody">
                <h1>Update Form</h1>

                <form id="updateForm" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value='' required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" class="form-control" id="position" name="position" value='' required>
                    </div>
                    <div class="form-group">
                        <label for="office">Office:</label>
                        <input type="text" class="form-control" id="office" name="office" value='' required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" value='' required>
                    </div>
                    <div class="form-group">
                        <label for="startdate">Start Date (dd-mm-yyyy):</label>
                        <input type="date" name="startdate" id="startdate" value='' required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="number" step="0.01" class="form-control" id="salary" value='' name="salary"
                            required>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="updateButton" class=" btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>