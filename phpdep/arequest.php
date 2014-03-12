<?
include '../classes/material.php';
//var_dump(json_decode($_POST['varPage']));
$obj1 = json_decode($_POST['varPage']);
$mat = new material;
$mat->createMaterial($obj1);
$mat->insertMaterial();
echo $mat;
//var_dump($mat);
//echo $mat->insertMaterial($obj);
?>
