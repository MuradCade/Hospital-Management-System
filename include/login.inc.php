<?php
require_once('../model/db.php');

if(isset($_POST['submit'])){
    

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
        //hashing password in registration form usid md5 example provided below
        // $pwdhash = md5($pwd);

        //created a sql template
        $sql = "SELECT * FROM login where username = ? and pwd = ? ";

        //create prepared statement
        $stmt = mysqli_stmt_init($connect);

        // prepare the prepared statement 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../index.php?errors=sql-statement-failed");
            exit();
        } else {
            //bind the parameters to the placeholder
            //means replace ?? to the actual data that we gets from the user
            //param stands for parameter
            mysqli_stmt_bind_param($stmt, "ss", $username, $pwd);
            //run parameters inside database
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result)  > 0) {
                $row = mysqli_fetch_assoc($result);
                $verified = password_verify($row['pwd'], $pwd);
                if ($row['username'] === $username && $row['pwd'] === $pwd) {
                    session_start();
                    session_regenerate_id();

                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];


                    header("location:home.php");
                    exit();
                } else {
                    header("Location:../index.php?error=incorrect-username-and-password");
                    exit();
                }
            } else {
                header("Location:../index.php?error=incorrect-username-and-password");
                exit();
            }
        }

}
else{
    header('location:../index.php');
}