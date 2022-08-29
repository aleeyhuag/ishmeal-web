
<?php

    function base(){
    printf(str_replace("header.php","",$_SERVER['PHP_SELF']));
    }

    $mybase = "base";
    
    $URL = explode("/",$_SERVER['QUERY_STRING']);

    if(isset($_POST['subscribe'])){

        include_once 'dbh.php';

        $mail = $_POST['email'];

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            header("Location: {$mybase()}error=invalidmail");
            exit();
        }
        else {
    
            $sql = "SELECT email FROM subscribers WHERE email=?";
            $stmt =mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: {$mybase()}error=sqlerror");
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $mail);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: {$mybase()}error=emailExist");
                }
                else{
                    $sql = "INSERT INTO subscribers (email) VALUES (?)";
                    $stmt =mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: {$mybase()}error=sqlerror");
                    }else {
                        mysqli_stmt_bind_param($stmt, "s", $mail);
                        mysqli_stmt_execute($stmt);
                        header("Location: {$mybase()}subscribe=success");                   
                    }
                }
            }
        } 
    } elseif (isset($_POST['request'])){

        $username = $_POST['name'];
        $usernumber = $_POST['pnumber'];
        $service = $_POST['services'];

        $usersubject = "REQUEST FOR CALL BACK";
        $usermessage = "Hello," .$username. " is requesting for a call-back regarding ".$service.", find below details.";
    
        $to = "info@ishmeal.com";
        $userbody = "";
        $headers = "From: no-reply@proinfinite.ng" ."\r\n" ."CC: aliyuag44@gmail.com";

        $userbody .= "Message: ".$usermessage. "\r\n";
        $userbody .= "Phone Number: ".$usernumber. "\r\n";

        mail($to, $usersubject, $userbody, $headers);

    } elseif (isset($_POST['request'])){

        $useremail = $_POST['email'];
        $username = $_POST['name'];
        $usernumber = $_POST['pnumber'];
        $message = $_POST['message'];

        $usersubject = "Contact from" .$username;
        $usermessage = $message;
    
        $to = "info@ishmeal.com";
        $userbody = "";
        $headers = "From: ". $useremail ."\r\n" ."CC: aliyuag44@gmail.com";

        $userbody .= "Message: ".$usermessage. "\r\n";
        $userbody .= "Phone Number: ".$usernumber. "\r\n";

        mail($to, $usersubject, $userbody, $headers);
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
    <link rel="stylesheet" href="<?php base() ?>css/index.css">
    <link rel="stylesheet" href="<?php base() ?>css/nav.css">
    <link rel="stylesheet" href="<?php base() ?>css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7bb3c6cfeb.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal@4"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.show_more',function(){
                var ID = $(this).attr('id');
                $('.show_more').hide();
                $('.loading').show();
                $.ajax({
                    type:'POST',
                    url:'ideas_more.php',
                    data:'id='+ID,
                    success:function(html){
                        $('#show_more_main'+ID).remove();
                        $('.insight-container').append(html);
                    }
                });
            });
        });
    </script>

    <script>
        ScrollReveal({ reset: true });
    </script>
</head>
<body>
    
    <header id="header">
        <div class="header-items">
            <p class="header-title">Management Consultants & Investor Advisors</p>
            <ul class="header-contact">
                <li><i class="fa-solid fa-phone"></i> +233 24 766 5283</li>
                <li><i class="fa-solid fa-envelope"></i> info@ieyamson.com</li>
                <li class="header-social">
                    Follow Us &nbsp; &nbsp;
                    <a href="https://www.facebook.com/ieyamson" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook" style="color: #fff;"></i></a>
                    <a href="https://twitter.com/ieyamson_assoc" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter" style="color: #fff;"></i></a>
                    <a href="https://www.instagram.com/ieyamson_associates/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram" style="color: #fff;"></i></a>
                    <a href="https://www.linkedin.com/company/ishmael-yamson-&-associates/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin" style="color: #fff;"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar">
            <div class="logo">
                <img src="<?php base() ?>img/hero/IY&A Logo.jpg" alt="">
            </div>
            <div class="toggle-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="links-container">
                <ul>                
                    <?php 
                    
                    $links = array("<li><a href=\"/ishmeal-web/index\" class=\"links\">Home</a></li>",
                    "<li><a href=\"/ishmeal-web/about\" class=\"links\">About Us</a></li>",
                    "<li><a href=\"/ishmeal-web/services\" class=\"links\">Services</a></li>",
                    "<li><a href=\"/ishmeal-web/programs\" class=\"links\">Programmes</a></li>",
                    "<li><a href=\"/ishmeal-web/events\" class=\"links\">Events</a></li>",
                    "<li><a href=\"/ishmeal-web/ideas-insight\" class=\"links\">Ideas & Insights</a></li>",
                    "<li><a href=\"/ishmeal-web/contact\" class=\"links\">Contact Us</a></li>");

                    
                
                    if($URL[0] == "index"){
                        $links[0] = "<li><a href='/ishmeal-web/index' class=\"links active\">Home</a></li>";
                        echo implode(" ",$links);
                    } elseif($URL[0] == "about"){
                        $links[1] = "<li><a href=\"/ishmeal-web/about\" class=\"links active\">About Us</a></li>";
                        for($i = 0; $i <= 6; $i++){
                            echo $links[$i];
                        }
                    }elseif($URL[0] == "services"){
                        $links[2] = "<li><a href=\"services\" class=\"links active\">Services</a></li>";
                        for($i = 0; $i <= 6; $i++){
                            echo $links[$i];
                        }
                    }elseif($URL[0] == "programs"){
                        $links[3] = "<li><a href=\"programs\" class=\"links active\">Programmes</a></li>";
                        for($i = 0; $i <= 6; $i++){
                            echo $links[$i];
                        }
                    }elseif($URL[0] == "events"){
                        $links[4] = "<li><a href=\"events\" class=\"links active\">Events</a></li>";
                        for($i = 0; $i <= 6; $i++){
                            echo $links[$i];
                        }
                    }elseif($URL[0] == "ideas-insight"){
                        $links[5] = "<li><a href=\"ideas-insight\" class=\"links active\">Ideas & Insights</a></li>";
                        for($i = 0; $i <= 6; $i++){
                            echo $links[$i];
                        }
                    }elseif($URL[0] == "contact"){
                        $links[6] = "<li><a href=\"contact\" class=\"links active\">Contact Us</a></li>";
                        for($i = 0; $i <= 6; $i++){
                            echo $links[$i];
                        }
                    }    
                    ?>
                </ul>
            </div>
        </div>
    </header>

    <div class="quick-media">
        <p>Let's Chat</p>
        <i class="fa-brands fa-whatsapp-square"></i>
    </div>

    <?php
        // echo"<pre>";
        // print_r($URL);
        // echo"</pre>";

        if (file_exists($URL[0]. ".php")){
            require_once($URL[0]. ".php");
        }else{
            require_once("refresh.php");
        }

    ?>