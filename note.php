<?php

    $insert = false;
    $delete = false;
    $update  =false;
    $fatch = false;
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  
  
  <title>notes</title>
  </head>
  <body>
<!-- navbar starts -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Notes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- navbar ends -->

<?php
if($insert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> Your data insert Successfully<br>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
// else {
//   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
//     <strong>Failds!</strong> Your data has not insert Successfully<br>.
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
// }


?>

<!-- add notes forms starts -->
<div class="container my-4">
    <form action="/prac2/note.php?" method="POST">
    <div class="mb-4">
        <label for="addnotes" class="form-label">Add Notes</label>
        <input type="text" name="add_notes" class="form-control" id="addnotes" required aria-describedby="emailHelp">
    </div>
    <div class="mb-5">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="descript" id="description" rows= "12"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Notes</button>
    </form>
</div>
<!-- add notes forms ends -->




<!-- table -->
<div class="container my-5">
<table class="table table-striped" id="myTable">
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Notes</th>
      <th scope="col">Description</th>
      <th scope="col">Date & Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>




    <?php 


// echo "Create note.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
  require "connection.php";
  
$add_notes  = $_POST['add_notes'];
$descript = $_POST['descript'];
$sql = "INSERT INTO `add_note` ( `add_notes`, `descript`, `D&T`) VALUES ( '$add_notes', '$descript', current_timestamp())";
$result = mysqli_query($con, $sql);
if($result){
  $insert = true;
}




  

  

$sql = "SELECT *FROM `add_note`";
  $result = mysqli_query($con, $sql);
  $num = 0;
  while($row= mysqli_fetch_assoc($result)){
    $num = $num + 1;
    echo 
    "<tr><th scope='row'>".$num."</th>
    <td>".$row['add_notes']."</td>
    <td>".$row['descript']."</td>
    <td>".$row['D&T']."</td>
    <td>".'<button type="button" class="btn btn-primary">Update</button>'."</td>
    <td>".'<button type="button" class="btn btn-primary">Upload</button>'."</td>
    <td>".'<button type="button" class="btn btn-primary">Delete</button>'."</td>
    </tr>";
  }
}
  ?>
  </tbody>
</table>
</div>
<!-- table -->


    <!-- Optional JavaScript; choose one of the two! -->
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


     <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>