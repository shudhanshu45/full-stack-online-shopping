
<?php include('partial/menu.php')?>

<div class="main-content">
    <div class="wrapper">
    <h1>DASHBOARD</h1>
    <br>
    <?php
  if(isset($_SESSION['login'])){
    echo $_SESSION['login'];
    unset($_SESSION['login']);
    
  }

        ?>
        <br>
 <div class="col-4 text-center">
  <?php 
  $sql = "SELECT *FROM catagory";

  $res = mysqli_query($conn , $sql);
  $count = mysqli_num_rows($res);
  ?>
    <h1><?php echo $count ?></h1>
    <br/>
    Categories
 </div>
 <div class="col-4 text-center">
 <?php 
  $sql2 = "SELECT *FROM items";

  $res2 = mysqli_query($conn , $sql2);
  $count2 = mysqli_num_rows($res2);
  ?>

    <h1><?php echo $count2?></h1>
    <br/>
 Items </div>
 <div class="col-4 text-center">
 <?php 
  $sql3 = "SELECT *FROM order2";

  $res3 = mysqli_query($conn , $sql3);
  $count3 = mysqli_num_rows($res3);
  ?>

    <h1><?php echo $count3 ?></h1>
    <br/>
    Total orders
 </div>
 <div class="col-4 text-center">
 <?php 
    $sql4 = "SELECT SUM(total) AS Total from order2";

    $res4 = mysqli_query($conn , $sql4);
    $row4 = mysqli_fetch_assoc($res4);

    $total_revenue = $row4['Total'];
    

    ?>

    <h1><?php echo $total_revenue; ?></h1>
    <br/>
    Revenue Generated
 </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php include('partial/footer.php')?>