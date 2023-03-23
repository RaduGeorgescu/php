<!-- CREATE -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">
                    Create Modal
                </h5>
            </div>
            <div class="modal-body">
                <form id="createForm" method="post">
                    <div class="form-group">
                        <label for="Name_create">Name:</label>
                        <input type="text" class="form-control" id="Name_create" name="Name_create" required>
                    </div>
                    <div class="form-group">
                        <label for="Position_create">Position:</label>
                        <input type="text" class="form-control" id="Position_create" name="Position_create" required>
                    </div>
                    <div class="form-group">
                        <label for="office_create">Office:</label>
                        <input type="text" class="form-control" id="office_create" name="office_create" required>
                    </div>
                    <div class="form-group">
                        <label for="age_create">Age:</label>
                        <input type="number" class="form-control" id="age_create" name="age_create" required>
                    </div>
                    <div class="form-group">
                        <label for="startDate_create">Start Date:</label>
                        <input type="date" class="form-control" id="startDate_create" name="startDate_create" required>
                    </div>
                    <div class="form-group">
                        <label for="salary_create">Salary:</label>
                        <input type="number" step="0.01" class="form-control" id="salary_create" name="salary_create"
                            required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" id="createButton" class="btn btn-primary">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>