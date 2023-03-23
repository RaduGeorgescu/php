<?php

require_once "core/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/datatables.min.css"
        rel="stylesheet" />

</head>

<body>
    <table id="myTable" class="display" style="width: 100%">
        <thead>
            <tr>
                <td><input type="text" placeholder="Minimum ID" id="idMin" name="idMin"></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Minimum age" id="ageMin" name="ageMin"></td>
                <td><label>Minimum date</label><input type="date" id="dateMin" name="dateMin"></td>
                <td><input type="text" placeholder="Minimum salary" id="salaryMin" name="salaryMin"></td>
            </tr>
            <tr>

                <td><input type="text" placeholder="Maximum ID" id="idMax" name="idMmax"></td>
                <td>
                    <!-- <input type="text" placeholder="name"> -->
                </td>
                <td>
                    <!-- <input type="text" placeholder="position"> -->
                </td>
                <td>
                    <!-- <input type="text" placeholder="Office"> -->
                </td>
                <td><input type="text" placeholder="Maximum age" id="ageMax" name="ageMax"></td>
                <td><label>Maximum date</label><input type="date" id="dateMax" name="dateMax"></td>
                <td><input type="text" placeholder="Maximum salary" id="salaryMax" name="salaryMax"></td>
                <td><button id="clear-filter">clear</button></td>
            </tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
            <th>Edit</th>
            <th>Details</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Edit</th>
                <th>Details</th>
            </tr>
        </tfoot>
    </table>
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
                            <input type="text" class="form-control" id="Position_create" name="Position_create"
                                required>
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
                            <input type="date" class="form-control" id="startDate_create" name="startDate_create"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="salary_create">Salary:</label>
                            <input type="number" step="0.01" class="form-control" id="salary_create"
                                name="salary_create" required>
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

    <!-- DELTE -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this one?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>

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

    <!-- DETAIL -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailModalLabel">Detail Modal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailModalBody">

                </div>
                <div class="modal-footer">
                    <button type="button" id="detailCloseButton" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/datatables.min.js"></script>
    <script src="javascript.js"></script>

</body>

</html>