<?php
$success = "hi";
if (isset($_POST['submit-idin'])) {
	
	include_once 'dbh.php';

    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
           
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif','JPG'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
        
            // insert a row
            $heading = $_POST["heading"];
            $tag = $_POST["tag"];
            $date = $_POST['date'];
            $details = $_POST['details'];

            // prepare sql and bind parameters
            $sql = "INSERT INTO ideas (heading, tag, date, details, image) 
            VALUES (?, ?, ?, ?, '$imgContent')";
            $stmt =mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $heading, $tag, $date, $details);
                mysqli_stmt_execute($stmt);

                if($stmt){
                    $success = '<p style=\'color: red; font-size: 20px;\'>Post successfully</p>'; 
                }else{ 
                    $success = '<p style=\'color: red; font-size: 20px;\'>Not Successful, try again. </p>';
                } 
            }else {
                $success = '<p style=\'color: red; font-size: 20px;\'>sql error or check image size</p>';
            }
        }else{ 
            $success = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        }
    }else{ 
        $success = 'Sorry, cannot processed'; 
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
            <div class="links-container">
                <ul>
                    <li><a href="#idin" class="links">Ideas & Insights</a></li>
                    <li><a href="about.html" class="links">About Us</a></li>
                </ul>
            </div>
        </div>
    </header>

    <section id="idin" class="call-back bg">
        <div class="call-back-heading">
            <h2>Ideas & Insight</h2>
        </div>
        <div class="call-back-container">
            <div class="call-back-icon about">
                <?php echo $success; ?>
                <p>Post views on things that matters!</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="heading" id="" placeholder="Heading">
                <input type="text" name="tag" id="" placeholder="Tag">
                <input type="date" name="date" id="" placeholder="Date">
                <input name="image" type="text" placeholder="Picture" onfocus="(this.type='file')">
                <textarea class="textarea" name="details" placeholder="Details"></textarea>
                <input type="submit" name="submit-idin" value="Post" class="normal red">
            </form>
        </div>
    </section>

    <!-- <section id="idin" class="call-back red" style="color: #fff;">
        <div class="call-back-heading">
            <h2>Ideas & Insight</h2>
        </div>
        <div class="call-back-container">
            <div class="call-back-icon about">
                <p>Post views on things that matters!</p>
            </div>
            <form action="">
                <input type="text" name="heading" id="" placeholder="Heading">
                <input type="text" name="tag" id="" placeholder="Tag">
                <input type="date" name="date" id="" placeholder="Date">
                <input type="file" name="image" id="" placeholder="Picture">
                <textarea class="textarea" name="" placeholder="Details"></textarea>
                <input type="submit" value="Post" class="normal blue" style="color: #fff;">
            </form>
        </div>
    </section> -->

    <script src="js/index.js"></script>

</body>
</html>