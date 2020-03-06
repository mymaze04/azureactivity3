<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css"href="asset/dist/css/adminlte.min.css"> -->
</head>
<body id="home-page">
        
          <div class="container">
        <header class="header">
            <a class="link-title" href="/">Azure Activity 3</a>
        </header>     

        <nav class="menu">  
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
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
            <input type="text" name="txt_productname" placeholder="Product Name"> <br><br>
            <label>Color    : </label>
            <input type="text" name="txt_color" placeholder="Color"> <br><br>
            <label>Price : </label>
            <input type="text" name="txt_price" placeholder="Price"> <br><br>
<!--              <label>Rate : </label>
            <input type="text" name="rate"> <br><br>
            <label>Worked Hours : </label>
            <input type="text" name="workedhours"> <br><br>
             <label>Deductions : </label>
            <input type="text" name="deductions">  -->
           <br><br>
           <!-- <input type="submit"> -->
           <button type="submit" name="btn_register" value="registerd">Register</button>
           
          </form>
            </div>
          <br><br><br><br> 
                    
           <div id="table">
            <table border=1 >
                <thead>
                <th  style="width: 80px;">ID</th>
                <th  style="width: 230px;">Product Name</th>
                <th  style="width: 140px;">Color</th>
                <th  style="width: 130px;">Price</th>
                  <th  style="width: 170px;">Action</th>
                  <!-- <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 199px;">Product Name</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 174px;">Color</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 123px;">Price</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 181px;">Action</th>
                </tr> -->
                </thead>
                <tbody>
                <?php
                           $servername="myit330server.mysql.database.azure.com";
                           $username="MarkAdmin@myit330server";
                           $password="Admin123";
                           $database="azureactivity3";
                        
                        
                           $conn = mysqli_connect($servername,$username,$password,$database);

                        $query = "Select Id,ProductName,Color,Price from products";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['Id'] . '</td>';
                            echo '<td>' . $row['ProductName'] . '</td>';
                            echo '<td>' . $row['Color'] . '</td>';
                            echo '<td>' . $row['Price'] . '</td>';
                            
                            
                           echo '<td class="text-center">
                           
                              <a href="pages/updateproduct.php? Id='.$row['Id'].'">
                                <button type="button" class="btn-sm btn btn-warning">Update</button>
                              </a>
                              
                              <a href="pages/deleteproduct.php? Id='.$row['Id'].'"">
                                <button type="button" class="btn-sm btn btn-danger">Delete</button>
                              </a>
                            
                            </td>';
                            echo '</tr>';
                           
                        }

                        mysqli_close($conn);

                        ?> 
                </tbody>
            </table>
            </div>
        </article>

        <br><br><br><br><br><br><br><br><br><br><br><br>
        <footer class="footer">
        
        &copy; 2020 Image Uploading Website &nbsp;<span class="separator">|</span> Design by:<a href="http://www.facebook.com/mymaze04">Mark Fernandez</a>    
        </footer>    


    </div>

</body>

</html>


<?php
//    $servername="mydemoserveractivity.mysql.database.azure.com";
//    $username="myadmin@mydemoserveractivity";
//    $password="Admin123";
//    $database="azureactivity3db";
   $servername="myit330server.mysql.database.azure.com";
   $username="MarkAdmin@myit330server";
   $password="Admin123";
   $database="azureactivity3";


   $con = mysqli_connect($servername,$username,$password,$database);

   if($_POST)
   {
       if($_POST["btn_register"])
       {
           $productname=$_POST['txt_productname'];
           $color =$_POST['txt_color'];
           $price =$_POST['txt_price'];
      
           
           $query = "insert into products(ProductName,Color,Price) values ('$productname','$color','$price')";


           if($productname=="" | $color=="" | $price==""){
              echo"<script>alert('Please Fill the Text Field')</script>";
           }
           else{
            if(!$con)
            {
               
                die("connection error");
            }
            if(mysqli_query($con, $query))
             {
              mysqli_close($con);
              
              echo "<script> alert('Successfully Saved!')</script>";
              echo "<script> window.location.href='index.php'</script>";
 
             }
           }

                             
        }
   }
?>
