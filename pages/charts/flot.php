<?php
include "../../database.php";

$sql = "SELECT Industry, COUNT(BusinessID) AS numberOfBusinesses
FROM business_industry
GROUP BY Industry;";

$result = $conn->query($sql);

$industryData = array();
while ($row = $result->fetch_assoc()) {
    $industryData[] = array('y' => $row['numberOfBusinesses'], 'x' => $row['Industry']);
}


$sqlSmallMedium = "SELECT COUNT(sBusinessID) AS numberOfSmallMediumBusinesses FROM smallmedium_business";
$resultSmallMedium = $conn->query($sqlSmallMedium);
$rowSmallMedium = $resultSmallMedium->fetch_assoc();
$numberOfSmallMediumBusinesses = $rowSmallMedium['numberOfSmallMediumBusinesses'];

$sqlLarge = "SELECT COUNT(lBusinessID) AS numberOfLargeBusinesses FROM large_business";
$resultLarge = $conn->query($sqlLarge);
$rowLarge = $resultLarge->fetch_assoc();
$numberOfLargeBusinesses = $rowLarge['numberOfLargeBusinesses'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator|Charts</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src="https://cdn.plot.ly/plotly-basic-latest.min.js"></script>

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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Types of Businesses Chart
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="donut-chart" style="height: 300px;"></div>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Business Industry Chart
                </h3>
    
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
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

<script src="../../dist/js/adminlte.min.js"></script>
<script src="https://cdn.plot.ly/plotly-basic-latest.min.js"></script>

<script>
    var donutData = [
      { label: 'Small-Medium Businesses', value: <?php echo $numberOfSmallMediumBusinesses; ?> },
      { label: 'Large Businesses', value: <?php echo $numberOfLargeBusinesses; ?> }
    ];

    var donutTrace = {
      values: donutData.map(function(item) {
        return item.value;
      }),
      labels: donutData.map(function(item) {
        return item.label;
      }),
      type: 'pie',
      hole: 0.4
    };

    var donutLayout = {
      title: 'Small-Medium Businesses vs Large Businesses',
    };
    var donutDataArray = [donutTrace];
    Plotly.newPlot('donut-chart', donutDataArray, donutLayout);


    //Bar Chart
    var industryData = <?php echo json_encode($industryData); ?>;
    var xValues = industryData.map(function(item) {
      return item.x;
    });

    var yValues = industryData.map(function(item) {
      return item.y;
    });
    
    var trace = {
    x: xValues,
    y: yValues,
    type: 'bar',
    marker: {
      color: '#3c8dbc'
    }
    };

    var layout = {
      title: 'Businesses by Industry',
      xaxis: {
        title: 'Industry'
      },
      yaxis: {
        title: 'Number of Businesses'
      }
    };

    var data = [trace];

    Plotly.newPlot('bar-chart', data, layout);
  </script>

</body>
</html>
