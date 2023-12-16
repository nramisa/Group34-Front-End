<?php 
include "database.php";

  if (isset($_POST['SignUp'])) {

    $first_name = $_POST['FirstName'];

    $last_name = $_POST['LastName'];

    $phoneno = $_POST['PhoneNo'];

    $email = $_POST['Email'];

    $password = $_POST['Password'];

    $city = $_POST['City'];

    $zip = $_POST['Zip'];

    $country = $_POST['Country'];

    $sex = $_POST['Sex'];

    $dob = $_POST['DOB'];

    $consumer = isset($_POST['Consumer?']) ? $_POST['Consumer?'] : '';

    $investor = isset($_POST['Investor?']) ? $_POST['Investor?'] : '';

    $govtrep = isset($_POST['GovernmentRep?']) ? $_POST['GovernmentRep?'] : '';

    $sql = "INSERT INTO `end_user`(`FirstName`, `LastName`, `PhoneNo`, `Email`, `Password`,`City`,`Zip`,`Country`,`Sex`,`DOB`,`Consumer?`,`Investor?`,`GovernmentRep?`) VALUES ('$first_name','$last_name','$phoneno','$email','$password','$city','$zip','$country','$sex','$dob','$consumer','$investor','$govtrep')";
    
    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "Account created successfully!";
      header( "refresh:2; url=./consumer-business.php" ); 

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close();

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">

</head>

<body class="signup-page login-page">

    <nav>
        <h1>Sustainable Businesses Directory</h1>
    </nav>

    <div class="wrapper">

            <h1>Sign Up</h1>

            <form action="" method="POST">

            <div class="input-box">
                <input type="text" name="FirstName" placeholder="First Name" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="text" name="LastName" placeholder="Last Name" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="text" name="PhoneNo" placeholder="Phone No." required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="text" name="Email" placeholder="Email" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="Password" placeholder="Password" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="text" name="City" placeholder="City" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="text" name="Zip" placeholder="Zip" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="text" name="Country" placeholder="Country" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="date" name="DOB" placeholder="Date of Birth" required>
                <i class='bx bx-user'></i>
            </div>

            Choose your role:<br>
            <input type="checkbox" name="Consumer?" value="Consumer?">Consumer
            <input type="checkbox" name="Investor?" value="Investor?">Investor
            <input type="checkbox" name="GovernmentRep?" value="GovernmentRep?">Government Representative

            <br><br>

             Gender:<br>

             <input type="radio" name="Sex" value="Male">Male

             <input type="radio" name="Sex" value="Female">Female

             <br><br>
             
            <button type="submit" name="SignUp" class="btn btn-success">Sign Up</button>

            <div class="login-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
