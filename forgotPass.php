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
    <link rel="stylesheet" href="styles.css">
    <title>California Mobility Center</title>
</head>
<body>
    <nav>
        <label class = "logo">
            <a href="index.html"><img src="/image/CMC-logo-horizontal.png" alt="logo" height="75px" width = "400px"/></a>
        </label>
    </nav>

    <div class="boxContent">
        <div class="forgotPass">
	  	<form action="passCode.php" method="post">
            	<label for="email">Email</label><br>
            	<input type="email" name="email" id="email"><br>
            	<a href="login.html" class="btn btn-primary">Back</a>
            	<input type="submit" class="btn btn-primary">
		</form>
        </div>  
    </div>
</body>
</html>