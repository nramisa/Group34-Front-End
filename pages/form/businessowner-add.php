<?php 
include "../../database.php";

if (isset($_POST['AddBusinessOwner'])) {
    $owner_ID = $_POST['OwnerID'];
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $sex = $_POST['Sex'];
    $business_ID = $_POST['BusinessID'];

    $sql = "INSERT INTO `business_owner`(`OwnerID`,`FirstName`, `LastName`, `Sex`) VALUES ('$owner_ID','$fname','$lname','$sex')";
    $result = $conn->query($sql);
    $sql = "INSERT INTO `ownedbusiness`(`OwnerID`,`BusinessID`) VALUES ('$owner_ID','$business_ID')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    } 

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator | Add Business Owner</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="info">
    <a href="#" class="d-block">Administrator Dashboard</a>
  </div>
</div>

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
   
    <li class="nav-item">
      <a href="/Sustainable Businesses(1)/pages/charts/flot.php" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Charts
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Tables
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/Sustainable Businesses(1)/pages/tables/data.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Business Data Table</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/Sustainable Businesses(1)/pages/tables/users-data.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Users Information Table</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Forms
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/Sustainable Businesses(1)/pages/form/project-add.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Business</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/Sustainable Businesses(1)/pages/form/project-remove.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Remove Business</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/Sustainable Businesses(1)/pages/form/project-update.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Update Business</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/Sustainable Businesses(1)/pages/form/user-remove.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Remove User Information</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/Sustainable Businesses(1)/pages/form/businessowner-add.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Add Business Owner</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/Sustainable Businesses(1)/pages/form/businessowner-remove.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Remove Business Owner</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="/Sustainable Businesses(1)/login.php" class="nav-link">
      <i class="nav-icon fas fa-sign-in-alt"></i>
      <p>Log Out</p>
      </a>
    </li>
  </ul>
</nav>
</div>
</aside>
   
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Business Owner</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <form action="" method="POST">

                 <div class="form-group">
                 <label for="OwnerID">Owner ID</label>
                 <input type="text" name="OwnerID" id="OwnerID" class="form-control">
                 </div>

                 <div class="form-group">
                 <label for="FirstName">First Name</label>
                 <input type="text" name="FirstName" id="FirstName" class="form-control">
                 </div>

                 <div class="form-group">
                 <label for="LastName">Last Name</label>
                 <input type="text" name="LastName" id="LastName" class="form-control">
                 </div>

                 <div class="form-group">
                   <label for="Sex">Gender</label>
                   <input type="text" name="Sex" id="Sex" class="form-control">
                 </div>

                 <div class="form-group">
                   <label for="BusinessID">Business ID</label>
                   <input type="text" name="BusinessID" id="BusinessID" class="form-control">
                 </div>

                 <div class="form-group">
                   <input type="submit" name="AddBusinessOwner" value="Add Business" class="btn btn-success">
                 </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>