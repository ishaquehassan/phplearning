<?php
if(isset($_POST['name']) and isset($_POST['number'])){
    include 'connection.php';
    /*$name = $_POST['name'];
    $number = $_POST['number'];
    */

    $cnt_list = implode(",",$_POST['list_id']);
    $ins = mysqli_query($connection,"INSERT INTO contacts_simple(cnt_name,cnt_number,cnt_lists) VALUE('".$_POST['name']."','".$_POST['number']."','".$cnt_list."')");
    if($ins){
        // MSG with get request header("Location: index.php?msg=Saved!");
        //Msg with session
        $_SESSION['msg'] = "Saved!";
        header("Location: index.php");
    }else{
        echo  mysqli_error($connection);
    }
}else{
    header("Location: index.php");
}
