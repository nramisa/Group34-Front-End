<?php
include "database.php";

$sql = "SELECT `business`.`BusinessName`, `business`.`WebsiteLink`, `business`.`BusinessType`, `business_supplier`.`supplierId`
        FROM `business`
        LEFT JOIN `business_supplier` ON `business`.`BusinessId` = `business_supplier`.`businessId`";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumer | Business</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body>
<div class="sidebar">

    <div class="sidebar-header">
        <h3>User Dashboard</h3>
        <hr style="border-color: #fff;">
    </div>

        <nav>
            <ul>
                <li>
                    <a href="#" id="consumerLink">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Consumer</span>
                    </a>
                    <ul class="treeview-menu" id="businessSubMenu">
                        <li><a href="consumer-business.php">
                                <i class="fas fa-building"></i>
                                <span class="nav-item">Businesses</span>
                            </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="investorLink">
                        <i class="fas fa-industry"></i>
                        <span class="nav-item">Investor & Government Rep</span>
                    </a>
                    <ul class="treeview-menu" id="investorSubMenu">
                        <li><a href="accreditation.php">
                                <i class="fas fa-certificate"></i>
                                <span class="nav-item">Accreditation</span>
                            </a></li>
                        <li><a href="typeofbusiness.php">
                                <i class="fas fa-cube"></i>
                                <span class="nav-item">Type of Businesses</span>
                            </a></li>
                        <li><a href="business-owner.php">
                                <i class="fas fa-user-tie"></i>
                                <span class="nav-item">Business Owners</span>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="sidebar-footer">
           <a href="login.php">
           <i class="fas fa-sign-out-alt"></i> Log Out
           </a>
        </div>
        
    </div>
    <div class="content-container">
        <div class="content-wrapper">
            <section class="content">
                <div class="container">
                    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Business Name</th>
                                                <th scope="col">Website Link</th>
                                                <th scope="col">Business Type</th>
                                                <th scope="col">Supplier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['BusinessName']; ?></td>
                                                        <td><a href="<?php echo $row['WebsiteLink']; ?>" target="_blank"><?php echo $row['WebsiteLink']; ?></a></td>
                                                        <td><?php echo $row['BusinessType']; ?></td>
                                                        <td><?php echo $row['supplierId']; ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#businessSubMenu, #investorSubMenu').hide();

            $('#consumerLink').click(function (e) {
                e.preventDefault(); 
                $('#businessSubMenu').toggle();
                $('#investorSubMenu').hide();
            });

            $('#investorLink').click(function (e) {
                e.preventDefault(); 
                $('#investorSubMenu').toggle();
                $('#businessSubMenu').hide();
            });
        });
    </script>
</body>

</html>


