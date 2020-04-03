<style>
	.videoLink {
		position: relative;
		top: 200px;
		;
		left: 48.7%;
		z-index: 1;
	}
	.videoLink img {
		height: 47px;
	}
</style>
<?php
require_once("models/MySQLConnection.php");
if (isset($_POST["btnsubmit"])) {
	$mySQLConnector = new MySQLConnection();
	$conn = $mySQLConnector->getConnection();
	$sql = "insert into feedbacks (subject,feedback) values('" . $_POST["txtSubject"] . "','" . $_POST["txtFeedBack"] . "')";
	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('Thanks for the Feed Back');</script>";
	}
}
?>
<?php include './views/header.php' ?>
<?php include './views/navbar.php' ?>
<div class="container">
	<h2>Send Your Feed Back </h2>
	<div class="row">
		<div class="col-md-6">
			<div class="h3-title">
				<h3>contact us</h3>
			</div>
			<ul>
				<li>
					<span class="fa fa-home" aria-hidden="true"></span>
					<p>123 Car Rental Store Auckland City.</p>
				</li>
				<li>
					<span class="fa fa-envelope-o" aria-hidden="true"></span>
					<a href="mailto:info@example.com">admin@carrental.com</a>
				</li>
				<li>
					<span class="fa fa-phone" aria-hidden="true"></span>
					<p>+64 12 345 4567</p>
				</li>
			</ul>
		</div>
		<div class="col-md-6">
			<form action="contact-us.php" method="POST" required="">
				<div class="form-group">
					<label for="text">Subject :</label>
					<input type="text" class="form-control" id="email" placeholder="Enter Subject " name="txtSubject" required="">
				</div>
				<div class="form-group">
					<label for="pwd">FeedBack Message :</label>
					<textarea class="form-control" rows="10" id="feedback" name="txtFeedBack" required="" placeholder="Enter Feed Back "></textarea>
				</div>
				<input type="submit" class="btn btn-primary" value="Submit" name="btnsubmit" />
			</form>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<a href="https://youtu.be/J3mibEf9trU" class="videoLink"><img src="views/img/mark.jpg" /> </a>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d102063.6763921414!2d174.6679383!3d-36.9264592!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x25e5947367274519!2sAce%20Rental%20Cars%20Auckland%20Airport!5e0!3m2!1sen!2sin!4v1583838896701!5m2!1sen!2sin" frameborder="0" style="border:0;width:100%;height:400px;" allowfullscreen="">
			</iframe>
		</div>
	</div>
</div>