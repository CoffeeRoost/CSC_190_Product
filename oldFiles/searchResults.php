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
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>California Mobility Center</title>
</head>
<body>
 <section id = "title">
        <nav class = "navbar navbar-expand-lg bg-Blue">
            <a href="index.php" class = "navbar-brand"><img class="logo" src="image/CMC-logo-horizontal.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white fs-4" href="./survey.html">Let's Start</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-4 mx-3" href="./login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>       
	
	<div class="d-flex justify-content-center my-5">
        <div class="boxContent my-1">
			<?php
				include('connection.php'); 
				
				$sql = "SELECT fname, lname, email, phone, address, gender, city FROM USER";
				$result = mysqli_query($con, $sql);
				
				echo '<table class= "table table-hover">';
					echo '<thead class="results"><tr>';
						echo '<th>  First   </th>';
						echo '<th>  Last    </th>';
						echo '<th>  Email   </th>';
						echo '<th>  Phone   </th>';
						echo '<th>  Address  </th>';
						echo '<th>  City    </th>';
						echo '<th>  Gender   </th>';
					echo '</tr></thead>';
					if (mysqli_num_rows($result) >0)
					{
						while($row = mysqli_fetch_assoc($result))
						{
							echo '<tr> <td>' . $row["fname"] . '</td>';
							echo '<td>' . $row["lname"] . '</td>';
							echo '<td>' . $row["email"] . '</td>';
							echo '<td>' . $row["phone"] . '</td>';
							echo '<td>' . $row["address"] . '</td>';
							echo '<td>' . $row["city"] . '</td>';
							echo '<td>' . $row["gender"] .  '</td></tr>';
							
						}
					}
					else
						echo 'No results';
				echo '</table>';	

			?>
			
	  </div>
    </div>
</body>
</html>
