<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("environment") or die(mysql_error());
if(isset($_GET['image_id'])) {
    $sql = "SELECT chemical_structure FROM chemicals WHERE id=" . $_GET['image_id'];
    $result = mysql_query("$sql") or die("<b-->Error: Problem on Retrieving Image BLOB<br>"
        . mysql_error());
    $row = mysql_fetch_array($result);
    header("content-type:png");
    echo $row["chemical_structure"];
}
mysql_close($conn);

?>