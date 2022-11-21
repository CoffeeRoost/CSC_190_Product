
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <title>California Mobility Center</title>
</head>
<body>
   <?php
   	include_once('content/navbarLogoutOnly.php');
	?>
	<div class="d-flex">
		<?php
			
			include_once('content/sideBarNoLogo.php');
		?>

	<div class="d-flex flex-column">
	<div class="container ms-3">
	<div class="row mt-3">
		<div class="col-lg-8">
			<form class="form-control bg-lightBlue">
				<!-- Contact Info. ID is read only, users are able to edit all other fields. -->
					<div class="container">
						<div class="row">
							<div class="col-lg-3">
								<label class="ms-3 mt-1" >ID:</label> 
							</div>
							<div class="col-lg-9">
								<input type="text" id="participantID" value="1234" readonly>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<label class="ms-3 mt-1" >First:</label> 
							</div>
							<div class="col-lg-9">
								<input type="text" id="FirstName" value="Patrick" >
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<label class="ms-3 mt-1" >Last:</label> 
							</div>
							<div class="col-lg-9">
								<input type="text" id="LastName" value="Star" readonly>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<label class="ms-3 mt-1" >Email:</label> 
							</div>
							<div class="col-lg-9">
								<input type="text" id="email" value="patrick@underthesea.com" readonly>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<label class="ms-3 mt-1" >Street:</label> 
							</div>
							<div class="col-lg-9">
								<input type="text" id="streetAddress" value="120 Conch Street" readonly>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
								<label class="ms-3 mt-1" >City:</label> 
							</div>
							<div class="col-lg-9">
								<input type="text" id="city" value="Ocean Bottom" readonly>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<label class="ms-3 mt-1" >ZIP Code:</label> 
							</div>
							<div class="col-lg-9">
								<input type="text" id="zip" value="12345" readonly>
							</div>
						</div>

				<!--contact save button. conventional button sizing did not seem to work, 
				adjusted in-line by percentage of view screen-->
				<div class="row">
					<div class="col-lg-9">
						&nbsp;
					</div>
					<div class="col-lg-2 mb-3">
						<button type="submit" style="height: 4vh; font-size: .75em;width: 4vw;" class="btn btn-primary btn-sm">Save</button>
					</div>
				</div>
			</div>
		</form>	
	</div>
	<!-- Upload widget-->	
	<div class="col-lg-4">	
		<form class="form-control bg-lightBlue">
			<input class="form-control" type="file" id="upload" multiple>
		</form>	
			</div>
		</div>
	</div>

	<!-- tabs -->
		<ul class="nav nav-tabs mt-3">
			  <li class="nav-item">
				<a class="nav-link active bg-lightBlue ms-3" aria-current="page" href="#">Contact/Demographics</a>
			  </li>

			  <li class="nav-item">
				<a class="nav-link active bg-lightBlue" href="#">Training</a>
			  </li>

			  <li class="nav-item">
				<a class="nav-link active bg-lightBlue" href="#">Employment/Career</a>
			  </li>

			<li class="nav-item">
				<a class="nav-link active bg-lightBlue" href="#">Support Services</a>
			</li>
		</ul>
		<!-- Notes area -->
			<form>
				<div class="form-group">
					<textarea class="form-control bg-lightBlue ms-3 mt-3" id="textArea" style="resize: none;" rows="5"></textarea>
					<label class="ms-3 mt-1" for="textArea">Notes:</label>
					<textarea class="form-control bg-lightBlue ms-3 mb-5" id="textArea" style="resize: none;" rows="5"></textarea>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
	