<?php
include "database.php";

$sql = "SELECT gUserID, Country, GovtIDNo, ConsultantID FROM governement_rep";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultant Dashboard</title>

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
            <h3>Consultant Dashboard</h3>
            <hr style="border-color: #fff;">
        </div>

        <nav>
            <ul>
                <li>
                    <a href="#" id="tablesLink">
                        <i class="fas fa-table"></i>
                        <span class="nav-item">Tables</span>
                    </a>
                    <ul class="treeview-menu" id="tablesSubMenu">
                        <li><a href="consultant.php">
                                <i class="fas fa-certificate"></i>
                                <span class="nav-item">Government Rep Table</span>
                            </a></li>
                        <li><a href="governmentrep.php">
                                <i class="fas fa-cube"></i>
                                <span class="nav-item">Government Rep Informations</span>
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
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-8">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Govt Rep ID</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">Consultant ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['gUserID']; ?></td>
                                                        <td><?php echo $row['Country']; ?></td>
                                                        <td><?php echo $row['ConsultantID']; ?></td>
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
            $('#tablesSubMenu').hide();

            $('#tablesLink').click(function (e) {
                e.preventDefault();
                $('#tablesSubMenu').toggle();
            });
        });
    </script>
</body>

</html>

