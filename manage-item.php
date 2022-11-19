<?php include('partial/menu.php')?>
<div class="main-content">
   <div class="wrapper">
    <h1>Manage Items</h1>
</br>
</br>
    <a href="<?php echo SITEURL; ?>admin/add-item.php" class ="btn-primary">Add Items </a>
</br>
</br>
<?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

?>
    <table class="tbl-full">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>price</th>
                <th>image</th>
                <th>Featured</th>
                <th>Active</th>
                 <th>Action</th>

                  </tr>
                  <?php
                  $sql = "SELECT*FROM items";
                  $res = mysqli_query($conn,$sql);

                  $count = mysqli_num_rows($res);
                  $sn =1;
                  if($count>0){

                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
                    <tr>
                        <td><?php echo $sn++ ?></td>
                    <td><?php echo $title;?></td>
                    <td><?php echo $price; ?></td>

                    <td>
                        <?php 
                         if($image_name==""){

                         }
                         else{
                           ?>
                           <img src ="<?php echo SITEURL;?>images/category/<?php echo $image_name ?>"width="100px">
                           <?php 
                         }

                         ?>

                    </td>
                    <td><?php echo $featured ;?></td>
                    <td><?php echo $active ;?> </td>

                    <td>
                        <a href="#" class = "btn-secondary">Update Items</a>
                        <a href="#" class = "btn-danger">Delete Items</a>

                </td>

                </tr>

  <?php
                    }

                  }else{
                    echo "<tr><td colspan ='7' class='error'>Items are not there </td></tr>";
                  }
                  ?>
              </table>
   </div>
</div>
<?php include('partial/footer.php')?>