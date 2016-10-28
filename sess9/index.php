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
?>
<?php if (!isset($_GET['editId'])) { ?>
    <form action="insert.php" method="post">
        <input type="text" name="name" value="" placeholder="Enter Contact Name"/>
        <input type="tel" name="number" value="" placeholder="Enter Contact Phone Number"/>
        <input type="submit" value="Save"/>
    </form>
<?php } else {
    $contacts_edit_query = mysqli_query($connection, "SELECT * FROM contacts WHERE cnt_id = " . $_GET['editId']) or die(mysqli_error($connection));
    $editData = mysqli_fetch_array($contacts_edit_query);
    ?>
    <form action="update.php?id=<?= $editData['cnt_id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $editData['cnt_id'] ?>">
        <input type="text" name="name" value="<?= $editData['cnt_name'] ?>" placeholder="Enter Contact Name"/>
        <input type="tel" name="number" value="<?= $editData['cnt_number'] ?>"
               placeholder="Enter Contact Phone Number"/>
        <input type="submit" value="Save"/>
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
        <?php while ($row = mysqli_fetch_array($contacts_query)) { ?>
            <tr>
                <td><?= $row["cnt_id"] ?></td>
                <td><?= $row["cnt_name"] ?></td>
                <td><?= $row["cnt_number"] ?></td>
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