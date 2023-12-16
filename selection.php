<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
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
        <h1>Welcome Employee! Select your dashboard:</h1>

        <?php
        echo '<a href="pages/charts/flot.php" class="btn btn-primary">Log in as Admin</a>';
        echo '<a href="consultant.php" class="btn btn-success">Log in as Consultant</a>';
        ?>
    </div>
</body>

</html>
