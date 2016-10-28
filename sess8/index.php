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
$data = array(
    "Name" => "Ishaq",
    "Age" => 21,
    "Language" => "Urdu",
    "Skills" => "Programming",
    "Friends" => array("Hassan", "Talha", "abc"),
    "Hello" => "World"
);
$strData = implode(",",$data["Friends"]);
$strToArray = explode(",",$strData);
?>
<h1>Array Length is : <?=count($data)?></h1>
<h2>Our Data Type of Data is : <?=gettype($data)?></h2>
<h3>Friends Data In String : <?=$strData?></h3>
<h4>Explode String In Array : <?=count($strToArray)?></h4>
<table border="1">
    <?php foreach ($data as $name => $value) { ?>
        <tr>
            <td><?=($name == "Name" ? "<strong>".$name."</strong>" : $name)?></td>
            <?php /*if($name == "Name"){ */?><!--
                <td><strong><?/*=$name*/?></strong></td>
            <?php /*}else{ */?>
                <td><?/*=$name*/?></td>
            --><?php /*} */?>

            <?php if (!is_array($value)) { ?>
                <td><?= $value ?></td>
            <?php } else { ?>
                <?php $str = "";
                foreach ($value as $index => $name){
                    $str .= $name.($index+1 != count($value) ? ", " : "");
                }
                ?>
                <td><?= $str ?></td>
                <!--<td><?/*=implode(", ",$value)*/?></td>-->
            <?php } ?>
        </tr>
    <?php } ?>
</table>

<?php
$connection = mysqli_connect("127.0.0.1","root","","php_learning_sess8");
if($connection){
    echo "Connected";
}

$contacts_query = mysqli_query($connection,"SELECT * FROM contacts") or die(mysqli_error($connection));
if($contacts_query){
    echo "Data get Success!";
    //$dataFromQuery = mysqli_fetch_array($contacts_query);
    ?>
    <table border="1">
        <?php while($row = mysqli_fetch_array($contacts_query)){ ?>
        <tr>
            <td><?=$row["cnt_id"]?></td>
            <td><?=$row["cnt_name"]?></td>
            <td><?=$row["cnt_number"]?></td>
        </tr>
        <?php } ?>
    </table>
<?php }
mysqli_close($connection);
?>
</body>
</html>