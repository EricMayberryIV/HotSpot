<?php
	if (isset($_POST['eventmade']))
	{
		// if creating new event
		if ($_GET['EID'] == "new")
		{
			$login = $_SESSION['login_user'];
			$query = mysqli_query($conn, "select U_ID from USER where U_USERNAME = '$login'");
			$result= mysqli_fetch_assoc($query);
			$creator = $result['U_ID'];
			$title = $_POST['title'];
			$date = $_POST['date'];
			$start = $_POST['start'];
			$end = $_POST['end'];
			$desc = $_POST['desc'];
			$byob = $_POST['byob'];
			$music = $_POST['music'];
			$food = $_POST['food'];
			$attire = $_POST['attire'];
			$type = $_POST['type'];
			$price = $_POST['price'];
			$sponsor = $_POST['sponsor'];
			$drink_type = $_POST['drinktype'];
			$havesponsor = 'N';
			
			if ($sponsor != "")
				$havesponsor = 'Y';
			
			do
			{
				$id = intval(microtime(true));
			}while(mysqli_num_rows(mysqli_query($conn, "select * from EVENT where E_ID='$id'" )) > 0);
			
			$query = "insert into `EVENT` (E_ID, E_CREATOR, E_TITLE, E_DATE, E_TIME_START, E_TIME_END, E_DESC, E_BYO, E_MUSIC_TYPE, LT_FOOD_F_FOOD_TYPE, 
													LT_ATTIRE_ATT_ATTIRE_TYPE, E_TYPE, E_PRICE, E_SPONSOR_TITLE, LT_DRINK_D_DRINK_TYPE, E_SPONSOR)
						values ('$id','$creator','$title','$date','$start','$end','$desc','$byob','$music','$food','$attire','$type','$price','$sponsor','$drink_type','$havesponsor')";
			$inserted = mysqli_query($conn, $query);
			
			if (!$inserted)
				echo mysqli_error($conn);
			else
				header("location: myprofile.php");
		}
		// if editing existing event
		else
		{
			$id = $_GET['EID'];
			$query = mysqli_query($conn, "select  E_ID, E_CREATOR, E_TITLE, E_DATE, E_TIME_START, E_TIME_END, E_DESC from EVENT where E_ID = '$id'");
			$result= mysqli_fetch_assoc($query);
			$title = $_POST['title'];
			$date = $_POST['date'];
			$start = $_POST['start'];
			$end = $_POST['end'];
			$desc = $_POST['desc'];
			$byob = $_POST['byob'];
			$music = $_POST['music'];
			$food = $_POST['food'];
			$attire = $_POST['attire'];
			$type = $_POST['type'];
			$price = $_POST['price'];
			$sponsor = $_POST['sponsor'];
			$drink_type = $_POST['drinktype'];
			$havesponsor = 'N';
			
			if ($sponsor != "")
				$havesponsor = 'Y';
			
			$query = "update `EVENT` set E_TITLE='$title', E_DATE='$date', E_TIME_START='$start', E_TIME_END='$end', E_DESC='$desc', E_BYO='$byob', E_MUSIC_TYPE='$music', LT_FOOD_F_FOOD_TYPE='$food', 
						LT_ATTIRE_ATT_ATTIRE_TYPE='$attire', E_TYPE='$type', E_PRICE='$price', E_SPONSOR_TITLE='$sponsor', LT_DRINK_D_DRINK_TYPE='$drink_type', E_SPONSOR='$havesponsor' WHERE E_ID='$id'";
						
			$updated = mysqli_query($conn, $query);
			
			if (!$updated)
				echo mysqli_error($conn);
			else
				header("location: myprofile.php");
		}
	}
?>