<?php

require_once "core/connection.php"; 


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">

</head>

<body>
  <table id="myTable" class="display" style="width:100%">

    <thead>
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
    </thead>
    <!-- <tfoot>
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
    </tfoot> -->
  </table>

  <script src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    //gets the data, popoulates the table with the data
    $('#myTable').DataTable({
      dom: 'Bfrtip',

      //make create button
      buttons: [{
        text: 'Create',
        action: function(e, dt, node, config) {
          window.location.replace("http://localhost/test/create.php");
        }
      }],

      //request to get the data
      ajax: {
        url: "modules/users/read.php",
        dataSrc: '' //left empty because we receive an array
      },

      //create the columns of the table
      columns: [{
          data: "ID"
        },
        {
          data: 'Name'
        },
        {
          data: 'Position'
        },
        {
          data: 'Office'
        },
        {
          data: 'Age'
        },
        {
          data: 'Startdate.date',
          render: function(data) {
            return new Date(data).toLocaleDateString('en-GB');
          }
        },
        {
          data: 'Salary'
        },
        //creates delete and update buttons on routes
        {
          data: null,
          render: function(data, type, row, meta) {
            return "<form action='update.php' method='post' id='update'><button type='submit' class='btn btn-warning'>update</button></form><form action='delete' id='delete'><button type='submit' class='btn btn-danger'>delete</button></form>";
          }
        },
        {
          data: null,
          render: function(data, type, row, meta) {
            return "<form action='details.php' method='post' id='details'><button type='submit' class='btn btn-primary'>details</button></form>";
          }
        }
      ]
    });
  });

  //delete
  $(document).on('click', '#myTable button', function(event) {
    event.preventDefault();
    //gets the row and the if of the row where the button was clicked
    const row     = $(this).closest('tr');
    const id      = row.find('td:first-child').text();
    const action  = $(this).closest('form').attr('id');

    //sends the user to the right page
    if        (action === 'update') {
      window.location.href = `http://localhost/test/update.php?data=${encodeURIComponent(id)}`;
    } else if (action === 'details') {
      window.location.href = `http://localhost/test/details.php?data=${encodeURIComponent(id)}`;
    } else if (action === 'delete') {
      
      //if it's delete handles it here bt creating a get req to the backend and delteting the user, after that refresh the page to update the ui
      $.ajax({
        url: 'modules/users/delete.php',
        type: 'GET',
        data: {
          id: id
        },
        success: function(response) {
          alert('user deleted');
          location.reload();
        },
        error: function(xhr, status, error) {
          alert('Error in deleting your user: ', error);
        }
      });
    };

  });
  </script>
</body>

</html>