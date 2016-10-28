<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sessen 9</title>
</head>
<body>



<?php
// DELETE query
include "connection.php";
if(isset($_GET['deleteId']))
{
    $delCmd = mysqli_query($dtb,"DELETE FROM contacts WHERE cnt_id=" .$_GET['deleteId']);
    if($delCmd){
        $_SESSION['msg'] = "Deleted.!";
        header("location: index.php");
        mysqli_close($dtb);
        exit;
    }
    else{
        mysqli_error($dtb);
    }
}



if(!isset($_GET['editId'])){ ?>
    <form action="insert.php" method="post">
        <input type="text" name="name" placeholder="Enter Name" required />
        <input type="tel" name="number" placeholder="Enter Number" required />
        <input type="submit" value="Submit"/>
    </form>

<?php }
else {
    include "connection.php";
    $cnt_edit_query = mysqli_query($dtb,"SELECT * FROM contacts WHERE cnt_id=" .$_GET['editId']) or die(mysqli_error($dtb));
    $edit_data = mysqli_fetch_array($cnt_edit_query);
    ?>
    <form action="edit.php?id=<?=$edit_data['cnt_id']?>" method="post">
        <input type="hidden" name="id" value="<?=$edit_data['cnt_id']?>">
        <input type="text" name="name" value="<?=$edit_data['cnt_name']?>">
        <input type="tel" name="number" value="<?=$edit_data['cnt_number']?>">
        <input type="submit" value="Update">
    </form>



<?php } ?>

<?php
// showing data
include "connection.php";
$contacts_query = mysqli_query($dtb,"SELECT * FROM contacts") or die(mysqli_error($dtb));
    if($contacts_query){ ?>
    <table border="1">
        <?php while ($row = mysqli_fetch_array($contacts_query)){ ?>
        <tr>
            <td><?= $row['cnt_id'] ?></td>
            <td><?= $row['cnt_name'] ?></td>
            <td><?= $row['cnt_number'] ?></td>
            <td><a href="index.php?editId=<?=$row['cnt_id'] ?>">Edit</a></td>
            <td><a href="index.php?deleteId=<?= $row['cnt_id'] ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
        <?php
    }
mysqli_close($dtb);
?>



</body>
</html>