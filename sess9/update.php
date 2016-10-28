<?php
if(isset($_POST['name']) and isset($_POST['number']) and isset($_POST['id'])){
    include 'connection.php';
    $ins = mysqli_query($connection,"UPDATE contacts SET cnt_name = '".$_POST['name']."',cnt_number = '".$_POST['number']."' WHERE cnt_id = ".$_GET['id']);
    if($ins){
        $_SESSION['msg'] = "Updated!";
        header("Location: index.php");
    }else{
        echo  mysqli_error($connection);
    }
}else{
    header("Location: index.php");
}
