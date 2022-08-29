<?php
	require 'dbh.php';

	$mail = $_POST['email'];

	if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		header("Location: index.php?error=invalidmail");
		exit();
	}
	else {

		$sql = "SELECT email FROM subscribers WHERE email=?";
		$stmt =mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: index.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $mail);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: index.php?error=emailExist");
				exit();
			}
			else{

				$sql = "INSERT INTO subscribers (email) VALUES (?)";
				$stmt =mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: index.php?error=sqlerror");
					exit();
				}
				else {

					mysqli_stmt_bind_param($stmt, "s", $mail);
					mysqli_stmt_execute($stmt);
					header("Location: index.php?subscribe=success");
					exit();
				}
			}
		}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

?>