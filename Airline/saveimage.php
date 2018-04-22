 
<?php
	session_start();
	include('setting.php');
	$test=$myurl.'include/config.php';
	include($test);
	include('include/function.php');

	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); 
	exit; }
	
    function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	  
	if (!empty($_FILES["uploadedimage"]["name"])) {
		$file_name=$_FILES["uploadedimage"]["name"];
		$temp_name=$_FILES["uploadedimage"]["tmp_name"];
		$imgtype=$_FILES["uploadedimage"]["type"];
		$ext= GetImageExtension($imgtype);
		$imagename=date("d-m-Y")."-".time().$ext;
		$target_path = "profile_images/".$imagename;
	
	$db=mysql_select_db($database, $con);	
	
	$sql="SELECT * FROM images_tbl WHERE email='".$_SESSION['email']."'";
	$db=mysql_select_db($database, $con);	
	$result=mysql_query($sql);
	$row = mysql_fetch_row($result);
	
	$sql="SELECT * FROM images_tbl WHERE email='".$_SESSION['email']."'";
	$result=mysql_query($sql);
	$row = mysql_fetch_row($result);
	
	if(empty($row['1'])) {
		if(move_uploaded_file($temp_name, $target_path)) {
			$query_upload = "INSERT INTO images_tbl (images_path, submission_date, email) VALUES ('".$target_path."', '".date("Y-m-d")."', '".$_SESSION['email']."')";
			mysql_query($query_upload) or die("Error in $query_upload == ".mysql_error());
			
			$sql1 = "UPDATE tbluser SET ImgPath='profile_images/$imagename' WHERE email='".$_SESSION['email']."'";
			mysql_query($sql1);
			
			echo "<script type='text/javascript'> self.close(); </script>";
	
		} else {
			exit("Error While uploading image on the server");
		}
	} else {
		if(move_uploaded_file($temp_name, $target_path)) {
			$query_upload = "UPDATE images_tbl SET images_path='".$target_path."', submission_date='".date("Y-m-d")."' WHERE email='".$_SESSION['email']."'";
			mysql_query($query_upload) or die("Error in $query_upload == ".mysql_error());
			
			$sql1 = "UPDATE tbluser SET ImgPath='profile_images/$imagename' WHERE email='".$_SESSION['email']."'";
			mysql_query($sql1);
			
			echo "<script type='text/javascript'> self.close(); </script>";
		
		} else {
			exit("Error While uploading image on the server");
		}
	}
}
?>
