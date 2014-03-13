<?
include '../classes/material.php';
//var_dump(json_decode($_POST['varPage']));
$obj1 = json_decode($_POST['varPage']);
$mat = new material;
$mat->createMaterial($obj1);
echo $mat->insertMaterial();
//var_dump($mat);
//var_dump($mat);
//var_dump($mat->insertMaterial());
?>
