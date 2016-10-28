<?php
if(isset($_POST['name']) and isset($_POST['number'])){
    include 'connection.php';
    /*$name = $_POST['name'];
    $number = $_POST['number'];
    */

    //$cnt_list = implode(",",$_POST['list_id']);
    $ins = mysqli_query($connection,"INSERT INTO contacts(cnt_name,cnt_number) VALUE('".$_POST['name']."','".$_POST['number']."')");
    if($ins){
        $maxCnt_id = mysqli_fetch_array(mysqli_query($connection,"SELECT MAX(cnt_id) max_id FROM contacts"))['max_id'];
        foreach ($_POST['list_id'] as $id){
            $insAssign = mysqli_query($connection,"INSERT INTO contacts_list_assigned(cnt_id,list_id) VALUES(".$maxCnt_id.",".$id.")");
        }
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
