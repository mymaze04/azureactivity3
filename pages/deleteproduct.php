<?php    
        if($_GET){
            $servername = "localhost";
            $username ="root";
            $password = "";
            $database = "azureactivity3";
            $connection = mysqli_connect($servername,$username,$password,$database);
            $Id = $_GET["Id"];
            $query = "Delete from products where Id = $Id";
            mysqli_query($connection,$query); 
            echo "<script>alert('Successfully Deleted')</script>";
            header("Location: ../index.php"); 
        }
?>