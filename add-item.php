<?php include('partial/menu.php')?>
<div class="main-content">
   <div class="wrapper">
    <h1> ADD FOOD </h1>
    <br> <br>
    <?php

    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" placeholder="Title of the item "></td>
</tr>
<tr>
                <td>Description:</td>
                <td><textarea name="description" cols="30" rows="5" placeholder="description"></textarea></td>
</tr>
<tr>
    <td>Price:</td>
    <td><input type="number" name="price"></td>

</tr>
<tr>
    <td>Select image:</td>
    <td> <input type ="file" name="image" ></td>
</tr>
<tr>
    <td> Category:</td>
    <td>
        <select name="category">
            <?php
          
          $sql = "SELECT *from catagory where active ='Yes' ";
          $res = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($res);
          if($count >0){
            while($row = mysqli_fetch_assoc($res) ){
                $id = $row['id'];
                $title = $row['title'];
                ?>
            <option value="<?php echo $id ?>"><?php echo $title?></option>

                <?php
            }
          }
          else{
    ?>
                <option value="0">No category found </option>

    <?php
          }
            ?>

</select>
    </td>
</tr>
<tr>
    <td>Featured:</td>
    <td><input type="radio" value="yes" name="featured">yes</td>
    <td><input type="radio" value="no" name="featured">no</td>


</tr>
<tr>
    <td>Active:</td>
    <td><input type="radio" value="yes" name="active">yes</td>
    <td><input type="radio" value="no" name="active">no</td>

</tr>
<tr>
    <td colspan="2">
<input type="submit" name="submit" value="Add item" class="btn-secondary">   

</td>
</tr>

</table>

</form>
<?php

if(isset($_POST['submit'])){

   $title = $_POST['title'];
   $description = $_POST['description'];
   $price = $_POST['price'];
   $category = $_POST['category'];
   if(isset($_POST['featured'])){
    $featured = $_POST['featured'];
   }
   else{
    $featured="No";

   }

   if(isset($_POST['active'])){
    $active = $_POST['active'];
   }
   else{
    $active ="No";
    
   }

   if(isset($_FILES['image']['name'])){
    $image_name = $_FILES['image']['name'];
    if($image_name != ""){
        //$ext =  end(explode('.',$image_name));
       // $image_name = "Item-name".rand(0000,9999).".".$ext;

        //$src = $_FILES['image']['tmp_name'];
        //$dst ="../images".$image_name;
        //$upload = move_uploaded_file($src,$dst);
        $ext = end(explode('.',$image_name));
        $image_name = "Item".rand(000,999).'.'.$ext;
    
          $source_path = $_FILES['image']['tmp_name'];
          $destination_path = "../images/category/".$image_name;
    
          $upload = move_uploaded_file($source_path, $destination_path);
    
        if($upload == false){
             $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";

             header('location:'.SITEURL.'admin/add-item.php');
            die();
        }

    }
   }
   else{
    $image_name ="";
   }
  
   $sql2 = "INSERT INTO items SET
     title = '$title',
     price = $price,
     image_name = '$image_name',
     catagory_id = $category,
     featured = '$featured',
     active = '$active'
 
     ";

$res2 = mysqli_query($conn,$sql2);

if($res2==true){
    $_SESSION['add'] = "<div class='sucess'> added item</div>";

    header('location:'.SITEURL.'admin/manage-item.php');


}else{
    $_SESSION['add'] = "<div class='error'>Failed to add</div>";

    header('location:'.SITEURL.'admin/manage-item.php');
}
}
?>
   </div> 
</div>


<?php include('partial/footer.php')?>