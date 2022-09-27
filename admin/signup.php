<?php

session_start();
include("session.php");
    $success = "";
    if (isset($_POST['submit'])) {
        
        include_once 'dbh.php';

        // insert a row
        $mail = $_POST["mail"];
        $name = $_POST["name"];
        $password=$_POST["password"];

        
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $success = "invalidmail";
        }else {
            $sql = "SELECT * FROM admins WHERE mail=?";
            $stmt =mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                $success = "sqlerror";
            }else{
                mysqli_stmt_bind_param($stmt, "s", $mail);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    $success = '<p style=\'color: red; font-size: 20px;\'>Multiple Emails found. Use different Email</p>';
                }else{
                    // prepare sql and bind parameters
                    $sql = "INSERT INTO admins (mail, name, password) 
                    VALUES (?, ?, ?)";

                    $stmt =mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        $success = "sqlerror2";
                    }else {
                        mysqli_stmt_bind_param($stmt, "sss", $mail, $name, $password);
                        mysqli_stmt_execute($stmt);
                        
                        if($stmt){
                            $success = '<p style=\'color: green; font-size: 20px;\'>New records created successfully</p>'; 
                        }else{ 
                            $success = '<p style=\'color: red; font-size: 20px;\'>Not Successful, try again. </p>';
                        } 
                    }
                }
            }
        }        

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ishmael Yamson & Associates - Management Consultants & Investor Advisors</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://kit.fontawesome.com/7bb3c6cfeb.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <header id="header">
        <div class="header-items">
            <p class="header-title">Management Consultants & Investor Advisors</p>
            <ul class="header-contact">
                <li><i class="fa-solid fa-phone"></i> +233 24 766 5283</li>
                <li><i class="fa-solid fa-envelope"></i> info@ieyamson.com</li>
                <li class="header-social">
                    Follow &nbsp; &nbsp;
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-whatsapp"></i>
                </li>
            </ul>
        </div>
        <div class="navbar">
            <div class="logo">
                <img src="img/hero/IY&A Logo.jpg" alt="">
            </div>
            <div class="toggle-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <section class="container">
        <form action="" method="post" enctype="multipart/form-data">
        <?php echo $success ?>
            <input type="text" name="name" id="" placeholder="Name">
            <input type="email" name="mail" id="" placeholder="Email">
            <input type="password" name="password" id="" placeholder="Password">
            <button name="submit" class="normal" style="background: #b70000;">Sign Up</button>
        </form>
    </section>
    
</body>
</html>