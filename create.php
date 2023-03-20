<?php

  require_once('core/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>
  <div class="container">
    <h1>Create Form</h1>
    <form id="form" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="position">Position:</label>
        <input type="text" class="form-control" id="position" name="position" required>
      </div>
      <div class="form-group">
        <label for="office">Office:</label>
        <input type="text" class="form-control" id="office" name="office" required>
      </div>
      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" name="age" required>
      </div>
      <div class="form-group">
        <label for="startDate">Start Date:</label>
        <input type="date" class="form-control" id="startDate" name="startDate" required>
      </div>
      <div class="form-group">
        <label for="salary">Salary:</label>
        <input type="number" step="0.01" class="form-control" id="salary" name="salary" required>
      </div>

      <div class='form-group' id="button">   
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function() {
    $("#form").submit(function(event) { //changed form from employee-form to form
      event.preventDefault(); 
      const form = $(this);
      $.ajax({
        type: "POST",
        url: "modules/users/insert.php",
        data: form.serialize(), // serialize form data into an 
        success: function(response) {
          $('#button').append('<div class="alert alert-success" role="alert"> user updates succesfully!</div>')
          form.trigger("reset"); // reset form fields
          window.location.replace("/test")
        },
        error: function(xhr, status, error) {
          $('#button').append(`<div class="alert alert-danger" role="alert"> Something Went Wrong: ${error}</div>`)
        }
      });
    });
  });
  </script>
</body>

</html>