<?php include('partials-front/menu.php'); ?>
<section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for items " required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php
if(isset($_SESSION['order'])){
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Items</h2>

            <?php
          $sql = "SELECT * from catagory WHERE active='Yes' AND feature ='YES' LIMIT 3";
          $res = mysqli_query($conn , $sql);

          $count = mysqli_num_rows($res);
          if($count >0){
            
               while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
            <a href="category-foods.html">
            <div class="box-3 float-container">
                <?php

                if($image_name == ""){
                    echo "<div class='error'>Image not available</div>";
                }
                else{
                ?>
                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                <?php

                }
                ?>

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>

                <?php
               }
          }
          else{
            echo "<div class='error'>Category not added </div>";
          }

            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center"> All Items</h2>

            <?php
              $sql2 = "SELECT *FROM items WHERE active='Yes' AND featured='Yes' LIMIT 6";
              $res2 = mysqli_query($conn , $sql2);

              $count2 = mysqli_num_rows($res2);

              if($count2 >0){
               

                while($row = mysqli_fetch_assoc($res2)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                     $image_name = $row['image_name'];
                     ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                <?php

   if($image_name == ""){
    echo "<div class='error'>Image not available</div>";
}
else{
?>
<img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

<?php

}
?>


                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price"><?php echo $price; ?></p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?item_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                     <?php
                }
              }
              else{
                echo "<div class='error'> Food not available </div>";

              }

            ?>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Items</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
<?php include('partials-front/footer.php'); ?>
