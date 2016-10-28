<?php
if(isset($_POST['name']) and isset($_POST['number'])){
    include 'connection.php';
    /*$name = $_POST['name'];
    $number = $_POST['number'];
    */
    $ins = mysqli_query($connection,"INSERT INTO contacts(cnt_name,cnt_number) VALUE('".$_POST['name']."','".$_POST['number']."')");
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
