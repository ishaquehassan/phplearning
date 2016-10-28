<?php
if(isset($_POST['name']) and isset($_POST['number']) and isset($_POST['id'])){
    include 'connection.php';

    $cnt_list = implode(",",$_POST['list_id']);

    if(isset($_POST['save'])){
        $ins = mysqli_query($connection,"UPDATE contacts SET cnt_name = '".$_POST['name']."',cnt_number = '".$_POST['number']."',cnt_lists = '".$cnt_list."' WHERE cnt_id = ".$_GET['id']);
    }elseif(isset($_POST['saveAs'])){
        $ins = mysqli_query($connection,"INSERT INTO contacts(cnt_name,cnt_number,cnt_lists) VALUE('".$_POST['name']."','".$_POST['number']."','".$cnt_list."')");
    }
    if($ins){
        $_SESSION['msg'] = "Updated!";
        header("Location: index.php");
    }else{
        echo  mysqli_error($connection);
    }
}else{
    header("Location: index.php");
}
