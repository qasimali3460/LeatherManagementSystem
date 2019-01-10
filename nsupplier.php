<?php
include 'connection.php';
if(isset($_POST['submit']))
{

	$name=$_POST['name'];
	$ph1=$_POST['ph1'];
	$ph2=$_POST['ph2'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$image="user.png";
	// print_r($_POST);

	$target_dir = "img/";
	$target_file = $target_dir . basename($_FILES["im"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	   if(!empty($_FILES["im"]["tmp_name"]))
	   {
	   	// echo "Image is selected";
	   	if(file_exists($target_file))
	   	{
	echo "<script>alert('Image with this file name already exist')</script>";
	   		$uploadOk=0;

	   	}
	   	else
	   	{
	   		
	   	 move_uploaded_file($_FILES["im"]["tmp_name"], $target_file);
	     $image=basename( $_FILES["im"]["name"]);
	   	}
	   }
	   else
	   {
	   	// echo "Image is not Selected";
	   }
	   	if($uploadOk==1)
	   	{
	   		
			$c=1000;
			$s=1000;

			$query=mysqli_query($con,"select max(id) from customer");

			$num=mysqli_num_rows($query);
			// echo "Size of founded array is ".$num;

			if(mysqli_num_rows($query)>0)    	
			{

				while($row=mysqli_fetch_array($query))
				{
					$query2=mysqli_query($con,"select cid from customer where id='$row[0]'");
					while($row2=mysqli_fetch_array($query2))
					{
						$c=$row2[0];
					}	
				}

			}
			// echo "Value of customer id ".$c;

			$query=mysqli_query($con,"select max(id) from supplier");

			$num=mysqli_num_rows($query);
			// echo "Size of founded array is ".$num;

			if(mysqli_num_rows($query)>0)    	
			{

				while($row=mysqli_fetch_array($query))
				{
					$query2=mysqli_query($con,"select cid from supplier where id='$row[0]'");
					while($row2=mysqli_fetch_array($query2))
					{
						$s=$row2[0];
					}	
				}

			}
			// echo "Value of Customer is ".$c;
			// echo "Value of Supplier is ".$s;


			// echo "Value of Supplier id ".$s;
			$g=$c;
			if($g<$s)
			{
				// echo "Supplier value is greater".$s;
				$g=$s;
			}
			$g+=1;
			$ins=mysqli_query($con,"insert into supplier(name,email,ph1,ph2,address,image,cid)values('$name','$email','$ph1','$ph2','$address','$image','$g')");
			if($ins)
			{
				echo "
				<script>
					alert('New User Added Successuflly')
				</script>
				";


			}




	   	}


	}


	}
?>



<!-- <?php
include 'connection.php';
if(isset($_POST['submit']))
{

$name=$_POST['name'];
$ph1=$_POST['ph1'];
$ph2=$_POST['ph2'];
$email=$_POST['email'];
$address=$_POST['address'];
$image="user.png";
// print_r($_POST);

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
   if(isset($_POST["fileToUpload"]))
   {
   	 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "Uploaded File is not an image.";
        $uploadOk = 0;
    }
   }
   else
   {
   		$uploadOk=0;
   }
}
// Check if file already exists

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
 		$image=basename( $_FILES["fileToUpload"]["name"]);
 		// echo "Uploaded File name is ".basename( $_FILES["fileToUpload"]["name"]);
		$c=1000;
		$s=1000;

		$query=mysqli_query($con,"select max(id) from customer");

		$num=mysqli_num_rows($query);
		// echo "Size of founded array is ".$num;

		if(mysqli_num_rows($query)>0)    	
		{

			while($row=mysqli_fetch_array($query))
			{
				$query2=mysqli_query($con,"select cid from customer where id='$row[0]'");
				while($row2=mysqli_fetch_array($query2))
				{
					$c=$row2[0];
				}	
			}

		}
		// echo "Value of customer id ".$c;

		$query=mysqli_query($con,"select max(id) from supplier");

		$num=mysqli_num_rows($query);
		// echo "Size of founded array is ".$num;

		if(mysqli_num_rows($query)>0)    	
		{

			while($row=mysqli_fetch_array($query))
			{
				$query2=mysqli_query($con,"select cid from supplier where id='$row[0]'");
				while($row2=mysqli_fetch_array($query2))
				{
					$s=$row2[0];
				}	
			}

		}
		echo "Value of Customer is ".$c;
		echo "Value of Supplier is ".$s;
		// echo "Value of Supplier id ".$s;
		$g=$c;
		if($g<$s)
		{
			echo "Supplier value is greater".$s;
			$g=$s;
		}
		$g+=1;
		$ins=mysqli_query($con,"insert into supplier(name,email,ph1,ph2,address,image,cid)values('$name','$email','$ph1','$ph2','$address','$image','$g')");
		if($ins)
		{
			echo "
			<script>
				alert('New User Added Successuflly')
			</script>
			";


		}






    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$name=$_POST['name'];
echo "Fuke us ".$name
;


}
?> -->