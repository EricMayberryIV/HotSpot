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
			
			do
			{
				$id = intval(microtime(true)) * 4;
			
				while($id > 99999999999)
					$id = $id - 10000000000;
				
			}while(mysqli_num_rows(mysqli_query($conn, "select * from EVENT where E_ID='$id'" )) > 0);
			
			mysqli_query($conn, "insert into EVENT (E_ID, E_CREATOR, E_TITLE, E_DATE, E_TIME_START, E_TIME_END, E_DESC)
						values ('$id','$creator','$title','$date','$start','$end','$desc')");
						
		}
		// if editing existing event
		else
		{
			$id = $_GET['EID'];
			$query = mysqli_query($conn, "select  E_ID, E_CREATOR, E_TITLE, E_DATE, E_TIME_START, E_TIME_END, E_DESC from EVENT where E_ID = '$id'");
			$result= mysqli_fetch_assoc($query);
			$title = $result['E_TITLE'];
			$date = $result['E_DATE'];
			$start = $result['E_TIME_START'];
			$end = $result['E_TIME_END'];
			$desc = $result['E_DESC'];
			
			if ($title != $_POST['title'])
			{
				$new = $_POST['title'];
				mysqli_query($conn, "update EVENT set E_TITLE='$new' WHERE E_ID='$id'");
			}
			
			if ($date != $_POST['date'])
			{
				$new = $_POST['date'];
				mysqli_query($conn, "update EVENT set E_DATE='$new' WHERE E_ID='$id'");
			}
			
			if ($start != $_POST['start'])
			{
				$new = $_POST['start'];
				mysqli_query($conn, "update EVENT set E_TIME_START='$new' WHERE E_ID='$id'");
			}
			
			if ($end != $_POST['end'])
			{
				$new = $_POST['end'];
				mysqli_query($conn, "update EVENT set E_TIME_END='$new' WHERE E_ID='$id'");
			}
			
			if ($desc != $_POST['desc'])
			{
				$new = $_POST['desc'];
				mysqli_query($conn, "update EVENT set E_DESC='$new' WHERE E_ID='$id'");
			}
			
			header("location: myprofile.php");
		}
	}
?>