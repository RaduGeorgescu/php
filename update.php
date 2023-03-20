<?php
    //REQUIRE CONNECTION
    require_once('core/connection.php');
    
    // get the data from the request and decode it
    $ID = json_decode($_GET['data'], true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">

</head>

<body>
  <div class="container mt-5">
    <h1>Update Form</h1>

    <form id="form" method="post">
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
      <input type="number" step="0.01" class="form-control" id="salary" value='' name="salary" required>
      </div>

      <div class='form-group' id="button"> 
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>
  <script src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
  <script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

  <script>
  $(document).ready(function() {

    //creates an id as a js object for ajax data requests
    const id = <?php echo $ID; ?>;

    //read request that selects the id and send it to the backend
    $.ajax({
      url: "modules/users/readOne.php",
      type: "POST",
      data: {
        id: id
      },
      success: function(response) {
        //recieves the data back of the element with that id and puts it into forms
        const data = JSON.parse(response);
        document.getElementById("age").value       = data.Age;
        document.getElementById("name").value      = data.Name;
        document.getElementById("office").value    = data.Office;
        document.getElementById("salary").value    = data.Salary;
        document.getElementById("position").value  = data.Position;
        document.getElementById("startdate").value = data.Startdate.date.split(' ')[0]; //keeps only the date, removes the time

      },
      error: function(xhr, status, error) {
        alert("Error adding:" + error);
      }
    })

    //update form that selects the id and the modified data and send it tothe backend
    $("#form").submit(function(event) {
      event.preventDefault(); //prevent default form submit

      const id           = <?php echo $ID; ?>;
      const form         = $(this);
      const formData     = form.serializeArray(); // get form data as an array
      const finishedData = formData.push({
        name: "id",
        value: id
      });
            
      const json = JSON.stringify(formData);

      $.ajax({
        url: "modules/users/update.php",
        type: "PUT",
        data: json,
        success: function(response) {
          console.log(response);
          $('#button').append('<div class="alert alert-success" role="alert"> user updates succesfully!</div>')
          // location.reload();
        },
        error: function(xhr, status, error) {
          $('#button').append(`<div class="alert alert-danger" role="alert"> Something Went Wrong: ${error}</div>`)
          // alert("Error adding:" + error);
        }
      });
    });
  });
  </script>
</body>

</html>