<?php

if (!isset($_SESSION['mail'])){

	echo "Unauthorized access";
	header("refresh: 3, url = index.php?Unauthorized");
    exit();

}
?>