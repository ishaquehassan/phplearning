<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session 8</title>
    <link href="css/styles.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="js/app.js"></script>
</head>
<body>
<?php
include 'connection.php';
if (isset($_GET['delId'])) {
    $delCmd = mysqli_query($connection, "DELETE FROM contacts WHERE cnt_id = " . $_GET['delId']);
    if ($delCmd) {
        $_SESSION['msg'] = "Deleted!";
        header("Location: index.php");
        mysqli_close($connection);
        exit;
    } else {
        echo mysqli_error($connection);
    }
}

//Static Array for lists $listsTypes = array("Friends","Family","Office","General");
$listsTypes = array();
$listDataQuery = mysqli_query($connection,"SELECT * FROM contact_lists");
while ($listRow = mysqli_fetch_array($listDataQuery)){
    $listsTypes[$listRow['list_id']] = $listRow['list_name'];
}
?>
<?php if (!isset($_GET['editId'])) { ?>
    <form action="insert.php" method="post">
        <input type="text" name="name" value="" placeholder="Enter Contact Name"/>
        <input type="tel" name="number" value="" placeholder="Enter Contact Phone Number"/>
        <br>
        <?php foreach ($listsTypes as $index => $listsType){ ?>
        <label>
            <input type="checkbox" name="list_id[]" value="<?=$index?>" /> <?=$listsType?>
        </label>
        <br>
        <?php } ?>
        <input type="submit" value="Save"/>
    </form>
<?php } else {
    $contacts_edit_query = mysqli_query($connection, "SELECT * FROM contacts WHERE cnt_id = " . $_GET['editId']) or die(mysqli_error($connection));
    $editData = mysqli_fetch_array($contacts_edit_query);
    $contact_list_ids = array();
    if(strlen($editData['cnt_lists']) > 0){
        $contact_list_ids = explode(",",$editData['cnt_lists']);
    }
    ?>
    <form action="update.php?id=<?= $editData['cnt_id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $editData['cnt_id'] ?>">
        <input type="text" name="name" value="<?= $editData['cnt_name'] ?>" placeholder="Enter Contact Name"/>
        <input type="tel" name="number" value="<?= $editData['cnt_number'] ?>"
               placeholder="Enter Contact Phone Number"/>
        <br>
        <?php foreach ($listsTypes as $index => $listsType){ ?>
            <label>
                <input type="checkbox" name="list_id[]" value="<?=$index?>" <?=(in_array($index,$contact_list_ids) ? "checked" : "")?> /> <?=$listsType?>
            </label>
            <br>
        <?php } ?>
        <input type="submit" name="save" value="Save"/>
        <input type="submit" name="saveAs" value="Save As"/>
    </form>
<?php } ?>

<?php if (isset($_SESSION['msg'])) { ?>
    <p><?= $_SESSION['msg'] ?></p>
    <?php unset($_SESSION['msg']);
} ?>


<?php
$contacts_query = mysqli_query($connection, "SELECT * FROM contacts") or die(mysqli_error($connection));
if (mysqli_num_rows($contacts_query) <= 0) { ?>
    <p>No Contacts Found!</p>
<?php }
if ($contacts_query) {
    //$dataFromQuery = mysqli_fetch_array($contacts_query);
    ?>
    <table border="1">
        <?php while ($row = mysqli_fetch_array($contacts_query)) {
            $contact_list_ids = explode(",",$row['cnt_lists']);
            $strListName = array();
            if(strlen($row['cnt_lists']) > 0){
                foreach ($contact_list_ids as $id){
                    $strListName[] = $listsTypes[$id];
                }
            }
            ?>
            <tr>
                <td><?= $row["cnt_id"] ?></td>
                <td><?= $row["cnt_name"] ?></td>
                <td><?= $row["cnt_number"] ?></td>
                <td><?= implode(",",$strListName) ?></td>
                <td><a href="index.php?editId=<?= $row["cnt_id"] ?>">Edit</a></td>
                <td><a href="index.php?delId=<?= $row["cnt_id"] ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
<?php }
mysqli_close($connection);
?>
</body>
</html>