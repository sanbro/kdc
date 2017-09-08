<?php 
include('db.class.php');
$conn= new db();
if (isset($_POST['submit']) && $_POST['menuid']!='' ) {
	$menu_name=$_POST['fname'];
	$parent_id=$_POST['menuid'];
	$success=$conn->insert('INSERT INTO `menu` (`menu_name`, `parent_id`) VALUES ("'.$menu_name.'",'.$parent_id.')');
	if ($success==True) {
		$Message="Added Successfully";
		header("Location:index.php?Success=".$Message);
	}
	else{
		$Message="There is error";
         header("Location:index.php?Message=".$Message);
	}
}else{
	$Message="Please select parent menu";
  header("Location:index.php?Message=".$Message);
}
?>