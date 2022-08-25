<?php 



include 'config.php';
include 'LoginLanguages.php';

session_start();



if (!isset($_SESSION['email'])) {

    header("Location: https://www.granna.ie/login");

}

$email = $_SESSION['email'];

$pix = $_SESSION['pix'];



    $sqlTicket = "SELECT * FROM ticket WHERE ( (email='$email') AND ( pix='$pix' )) ORDER BY id DESC";

    $resultTicket = mysqli_query($conn, $sqlTicket);

    

    $row = $resultTicket->fetch_assoc();

    

    $TicketID = $row["id"];

    $brlToSend = $row["brlToSend"];

    $eurToReceive = $row["eurToReceive"];

    $dateRun = $row["dateRun"];

    $dateOver = $row["dateOver"];

    //echo "<script>alert('$TicketID')</script>";

    

    //    $ChosenBank = $_POST['ChosenBank'];

    //https://www.granna.ie/login/charged.php?ChosenBank

    //<div class="input-group"><label for="email">Registered email</label> <input type="text" name="email" value="<?php echo $dateOver;



if (isset($_POST['submit']))

    {

            $ChosenBank = $_POST['ChosenBank'];

            

            //echo "<script>alert('$ChosenBank')</script>";

			

			$sqlTicket = "UPDATE ticket SET SelectedBank='$ChosenBank' WHERE ticket.id ='$TicketID'";

			$result = mysqli_query($conn, $sqlTicket);

			

		    //if (!$result->num_rows > 0)

		    //{

		    ////echo "<script>alert('$ChosenBank')</script>";

		    //  

			//if ($result) { echo "<script>alert('OKAY')</script>"; }

			//else {         echo "<script>alert('Woops! Something Wrong Went.')</script>";}

		    //} else { echo "<script>alert('Woops! Recipient Already Exists.')</script>";}

		    

		    header('Location: https://www.granna.ie/login/charged.php?ChosenBank');

	}

	

    



?>



<html>

<head>

<link rel="stylesheet" type="text/css" href="select.css">

<title>granna</title>



<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   			

	<link rel="stylesheet" type="text/css" href="style.css">



	<title>granna</title>

</head>

<body>



	<div class="container">

        <p class="login-text" style="font-size: 2rem; font-weight: 800;"><?php echo $SelectBank ?></p>

		<form action="" method="POST" class="login-email">

        

        <div class="input-group"><label for="ticketID"><b><?php echo $TicketNumber ?></b></label><input type="text" name="ticketID" value="<?php echo $TicketID;?>" disabled> </div>		 

            <br>

        <label> <input type="radio" name="ChosenBank" value="BOI" checked> BOI - <?php echo $BOI ?></label>

            <br>

            <br>

        <label> <input type="radio" name="ChosenBank" value="AIB"> AIB - <?php echo $AIB ?></label>

            <br>

            <br>

        <label> <input type="radio" name="ChosenBank" value="ANP" disabled > PSC - <?php echo $PSC ?></label>

            <br>



			<div class="input-group">

			    <br>

				<button name="submit" class="btn"><?php echo $Pay ?></button>

            </div>

            <br>

			<p class="login-register-text"><a href="https://www.granna.ie/login/main.php"><?php echo $Cancel ?></a></p>



		</form>

	</div>

</body>

</html>