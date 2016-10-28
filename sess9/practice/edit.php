<?php

if(isset($_POST['name']) and isset($_POST['number']) and isset($_POST['id'])){
    include "connection.php";
    $update = mysqli_query($dtb,"UPDATE contacts SET cnt_name='".$_POST['name']."', cnt_number='".$_POST['number']."' WHERE cnt_id=".$_POST['id']);
    if($update){
        $_SESSION['msg'] = "Updated..!";
        header("Location: index.php");
    }
    else{
        echo mysqli_error($dtb);
    }
}
else{
    header("Location: index.php");
}

