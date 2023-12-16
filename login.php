<?php
include "database.php";

if (isset($_POST['Login'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sqlUser = "SELECT * FROM `end_user` WHERE `Email`='$email' AND `Password`='$password'";
    $resultUser = $conn->query($sqlUser);

    if ($resultUser) {
        if ($resultUser->num_rows > 0) {
            session_start();
            $_SESSION['user_id'] = $resultUser->fetch_assoc()['UserID'];
            header("refresh:2; url=consumer-business.php"); 
            exit();
        } 
    } else {
        die("Error: " . $conn->error);
    }

    $sqlEmp = "SELECT * FROM `employee` WHERE `Email`='$email' AND `Password`='$password'";
    $resultEmp = $conn->query($sqlEmp);

    if ($resultEmp->num_rows > 0) {
        $rowEmp = $resultEmp->fetch_assoc();

        if ($rowEmp['Admin?'] == 'A' && $rowEmp['Consultant?'] == 'C') {
            session_start();
            $_SESSION['user_id'] = $rowEmp['EmployeeID'];
            header("refresh:2; url=selection.php");
            exit();
        } elseif ($rowEmp['Admin?'] == 'A') {
            session_start();
            $_SESSION['user_id'] = $rowEmp['EmployeeID'];
            header("refresh:2; url=pages/charts/flot.php");
            exit();
        } elseif ($rowEmp['Consultant?'] == 'C') {
            session_start();
            $_SESSION['user_id'] = $rowEmp['EmployeeID'];
            header("refresh:2; url=consultant.php");
            exit();
        }
    }

    echo "Invalid email or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="signup-page login-page">
    <nav>
        <h1>Sustainable Businesses Directory</h1>
    </nav>

    <div class="wrapper">

        <form action="" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="Email" placeholder="Email" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="Password" placeholder="Password" required>
                <i class='bx bx-lock-alt'></i>
            </div>

            <button type="submit" name="Login" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="signup.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
