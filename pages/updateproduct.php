<?php
    if($_GET)
    {
        $Id = $_GET["Id"];
        

        $servername="localhost";
        $username="root";
        $password="";
        $database="azureactivity3";

        $con = mysqli_connect($servername,$username,$password,$database);

        $query = "select * from products where Id = $Id";
        $res = mysqli_query($con,$query);

        $ProductName = "";
        $Color = "";
        $Price = "";
  

        if(mysqli_num_rows($res) > 0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $ProductName = $row["ProductName"];
                $Color = $row["Color"];
                $Price = $row["Price"];
               

            }
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- <link rel="stylesheet" type="text/css"href="asset/dist/css/adminlte.min.css"> -->
</head>
<body id="home-page">
        
          <div class="container">
        <header class="header">
            <a class="link-title" href="/">Azure Activity 3</a>
        </header>     

        <nav class="menu">  
            <ul>
                <li><a href="../index.php" class="active">Home</a></li>
                <!--<li>  <a href="fileManager.php">File Manager</a></li>-->
              
            </ul>
        </nav>    

<!-- <aside>
<h1>Side Bar</h1>    
</aside>     -->
           
        <article class="main">
        <div id="form">
          <form action="#" method="post" enctype="multipart/form-data" >
            
            <label>Product Name : </label>
            <?php
            echo "<input type='text' value='$ProductName' name='txt_productname'>";
            
            ?>
             <br><br>
            <label>Color    : </label>
            <?php
            echo "<input type='text' value='$Color' name='txt_color'>";
            
            ?>
             <br><br>
            <label>Price : </label>
            <?php
            echo "<input type='text' value='$Price' name='txt_price'>";
            
            ?>
             <br><br>

           <br><br>

           <button type="submit" name="btn_update" value="updated">Update</button>
           
          </form>
            </div>
          <br><br><br><br> 
                
        </article>

        <br><br><br><br><br><br><br><br><br><br><br><br>
        <footer class="footer">
        
        &copy; 2020 Image Uploading Website &nbsp;<span class="separator">|</span> Design by:<a href="http://www.facebook.com/mymaze04">Mark Fernandez</a>    
        </footer>    


    </div>

</body>

</html>


<?php
      $servername="localhost";
      $username="root";
      $password="";
      $database="azureactivity3";

      $con = mysqli_connect($servername,$username,$password,$database);
    
    if($_POST)
    {
      
     if($_POST["btn_update"] == "updated")
     {
         $updated_Id = $Id;
         $updated_ProductName = $_POST["txt_productname"];
         $updated_Color = $_POST["txt_color"];
         $updated_Price = $_POST["txt_price"];
        
         //$updated_user_confirmationpassword = $_POST["txt_confirmationpassword"];
         
 
     
           $updated_query = "update products set ProductName= '$updated_ProductName', Color = '$updated_Color', Price = '$updated_Price' where Id= '$updated_Id' ";
           
           
           if(mysqli_query($con,$updated_query))
           {
             echo "<script>alert('Successfully Updated')</script>";
            echo "<script> window.location.href='../index.php'</script>";
            mysqli_close($con);
            
           }
           else
           {
             echo "<script>alert('already exist')</script>";
           }
           
          
     }
 
    }

?>