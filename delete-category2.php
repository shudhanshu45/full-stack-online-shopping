<?php include('../config/constants.php') ?>


<?php
if(isset($_GET['id']) AND isset($_GET['image_name'])){

$id = $_GET['id'];
$image_name = $_GET['image_name'];

if($image_name != ""){
    $path = "../images/category/".$image_name;
    $remove = unlink($path);
    if($remove == false){
        $_SESSION['remove'] = "<div class ='error'>Failed to remove image</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
        die();
    }
}
$sql = "DELETE FROM catagory WHERE id = $id";
$res = mysqli_query($conn,$sql);

if($res == true){
    $_SESSION['delete'] = "<div class ='sucess'>This category is deleted </div>";

    header('location:'.SITEURL.'admin/manage-category.php');

}
else{
    $_SESSION['delete'] = "<div class ='error'>Failed to delete category </div>";

    header('location:'.SITEURL.'admin/manage-category.php');

}

}
else{
header('location:'.SITEURL.'admin/manage-category.php');
}
?>