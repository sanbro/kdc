<?php include ('db.class.php'); 
  $database= new db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>menu</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<style>
	.submenu{
		padding-left: 5px;
		color:#ccc;
	}
</style>
<body>
<div class="container">
<div class="row">
	<div class="col-md-3">
		<h1>Parent Menu</h1>
		<?php $allmenu=$database->getall('SELECT * FROM `menu` ORDER BY `menu_id` ASC');?>
		<ul>
		<?php if (is_array($allmenu)&& count($allmenu)!= 0) {
			foreach ($allmenu  as $mvalue) {
		 ?>
			<li><a href="#" onclick="addcat(<?php echo $mvalue['menu_id']; ?>)"><?php echo $mvalue['menu_name']; ?></a></li>
			<?php if($mvalue['parent_id']!=''){

				 ?>
				 <ul class="submenu" >

				 	<li><a href="#" onclick="addcat(<?php echo $mvalue['parent_id']; ?>)"><?php echo $mvalue['menu_name']; ?></a></li>

				 </ul>
           
			<?php }
		     }

			}?>
		</ul>
	</div>
	<div class="col-md-9">
		<h1>Form</h1>

		<?php 
        if(isset($_GET['Message'])){
        	?>
        	<p class="text-danger">
          <?php echo $_GET['Message']; ?> 
          </p>
         <?php }
		?>
		<?php 
        if(isset($_GET['Success'])){
        	?>
        	<p class="text-primary">
          <?php echo $_GET['Success']; ?> 
          </p>
         <?php }
		?>
		<form class="form-inline" method="post" id="addmenuform" action="insertMenu.php">
		   
		   	
		  
		   <div class="form-group">
		     <input type="hidden" name="menuid" id="menuid">
			 <input class="form-control" type="text" name="fname" id="fname" value="Menu name" required="required">
             <button class="btn btn-primary" type="submit" name="submit">Submit</button>
           </div>
		</form>
	</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type='text/javascript'>
        function addcat(id){
           document.getElementById("menuid").value = id;
        }

</script>

</html>