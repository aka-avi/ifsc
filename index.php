<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IFSC Info</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>IFSC Info</h1>
	</header>
	<!-- form to get data -->
	<form method="GET" action="index.php">
		<input type="text" name="ifsc" placeholder="Enter IFSC Code Here">
		<input type="submit" name="submit" value="submit">
	</form>
	<div class="ifscinfo">
		<?php  
		//checking for form submission
		if(isset($_GET['submit'])){
			$ifsc = $_GET['ifsc'];
			//getting info from api
			$json = @file_get_contents('https://ifsc.razorpay.com/'.$ifsc);

			// converting json to boject
			$ifscarr = json_decode($json);

			//printing values
			if(isset($ifscarr)){	?>
				<p><span>Branch : </span><?php echo $ifscarr->BRANCH;?></p>
				<p><span>Address : </span><?php echo $ifscarr->ADDRESS;?></p>
				<p><span>State : </span><?php echo $ifscarr->STATE;?></p>
				<p><span>Contact Number : </span><?php echo $ifscarr->CONTACT;?></p>
				<p><span>UPI Availability : </span><?php echo $ifscarr->UPI == 1 ? 'Yes' : 'No Info' ?></p>

				<p><span>RTGS : </span><?php echo $ifscarr->RTGS == 1 ? 'Yes' : 'No Info' ?></p>
				<p><span>Bank Name: </span><?php echo $ifscarr->BANK;?></p>
				<p><span>NEFT: </span><?php echo $ifscarr->NEFT == 1 ? 'Yes' : 'No Info' ?></p>
				<p><span>BankCode : </span><?php echo $ifscarr->BANKCODE;?></p>
				<p><span>SwiftCode : </span><?php echo $ifscarr->SWIFT;?></p>
				<?php }else {	 ?>
				<p class="error"><?php echo "Please Enter a Valid IFSC Code"; ?></p>
			<?php } ?>

		<?php } ?>
	</div>
</body>
</html>