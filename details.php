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
  <title>Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">

</head>

<body>
  <div id='container' class="container mt-5">
    <h1>Details</h1>
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
        
        //goes over each item in data and creates an element composed of label and input based on what it recieves
        jQuery.each(data, (i, elemnt) => {
          try {
            if (i === 'Startdate') {
              const date = elemnt.date.split(' ')[0];
              $('#container').append(`<label for='${i}'>Start Date (dd-mm-yyyy):</label><input readonly type="date" id='${elemnt}' name='${elemnt}' value='${date}' required /> <br />`)     
            } else if (elemnt === null) {
              return true;
            } else {
              $('#container').append(`<label for='${i}'>${i}:</label><input readonly class="form-control" id='${elemnt}' name='${elemnt}' value='${elemnt}'/>`)
            }

          } catch (error) {
            $('body').append(`<div class="alert alert-danger" role="alert"> Something Went Wrong: ${error}</div>`)
            alert("Error adding:" + error);
          }    
        });

        
      },
      error: function(xhr, status, error) {
        $('body').append(`<div class="alert alert-danger" role="alert"> Something Went Wrong: ${error}</div>`)
      }
    })

  });
  </script>
</body>

</html>