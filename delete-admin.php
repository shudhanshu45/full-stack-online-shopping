<?php
include('../config/constants.php');
 echo $id = $_GET['id'];

 $sql = "DELETE FROM admin WHERE id =$id";
 $res = mysqli_query($conn,$sql);

 if($res == TRUE){
 // echo "Admin deleted"
 $_SESSION['delete'] = " <div class='sucess'> Admin deleted sucessfully </div>";
 header('location:'.SITEURL.'admin/manage-admin.php');
 }else{

    $SESSION['delete'] = "<div class='error'>failed to delete </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}
?>