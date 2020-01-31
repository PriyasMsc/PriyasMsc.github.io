<?php
	if(!empty($_FILES['image'])){
		$conn  = new mysqli("localhost", "860030", "ramdeveloper", "860030") or die(mysqli_error($conn));
		$path = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                $image = time().'.'.$path;
                move_uploaded_file($_FILES["image"]["tmp_name"], 'images/'.$image);
				$conn->query("INSERT INTO `member` (image,flag) VALUES('$image','2')") or die(mysqli_error($conn));
	}else{
		echo "<script>Error!</script>";
	}
?>