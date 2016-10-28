<?php

if(isset($_POST['name']) AND isset($_POST['number']))
{
    include "connection.php";
    $ins = mysqli_query($dtb,"INSERT INTO contacts(cnt_name,cnt_number) values('".$_POST['name']."','".$_POST['number']."')");
    if($ins){
        $_SESSION['msg'] = "Saved!";
        header("location: index.php");
    }
    else{
        mysqli_error($dtb);
    }

}
else{
    header("location: index.php");
}
?>