<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"/>
	<!-- Latest compiled JavaScript -->
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
	
	<!-- Use the JavaScript DataTable library to easily sort query results -->
	<script type="text/javascript" language="javascript">
		$(document).ready(function ()
		{ 
			$('#search_results').DataTable({paging: false, searching: true, ordering: true }); 
		});
	</script>
	
    
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
        <div class="boxContentSearch my-1">

<?php

$search_result = "";


$query = "SELECT fname, lname, email, primaryPhone AS phone, street AS address, city, gender FROM participation JOIN address ON participation.userid = address.userid";
$summary = "SELECT COUNT(*) AS Count, 100.0 * COUNT(*) / SUM(COUNT(*)) OVER () AS Percentage, employmentStatus AS `Employment Status` FROM employment GROUP BY employmentStatus";
$education = "SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, highestGradeComplete AS `Highest Grade Complete` FROM education GROUP BY highestGradeComplete";
$county = "SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, County FROM address GROUP BY County";
$city = "SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, City FROM address GROUP BY City";
$search_result = filterTable($query);
$summary_result = filterTable($summary);

//connection to database and query execution
function filterTable($query) {
    $connect = mysqli_connect("localhost", "root", "", "csc190");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

function outputTable($result, $columns)
{
	if (mysqli_num_rows($result) > 0)
	{
		echo '<table class="table table-bordered border-primary table-sm w-50">';
		echo '<thead>';
		foreach ($columns as $value)
		{
			echo "<th>$value</th>";
		}
		echo '</thead>';
		echo '<tbody>';
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			
			foreach ($columns as $value)
				echo "<td>$row[$value]</td>";
			
			echo "</tr>";
		}
		echo '</tbody>';
		echo '</table>';
	}
}


        
        echo '<table id="search_results" class= "table table-hover">';
            echo '<thead class="results"><tr>';
                echo '<th>  First   </th>';
                echo '<th>  Last    </th>';
                echo '<th>  Email   </th>';
                echo '<th>  Phone   </th>';
                echo '<th>  Address  </th>';
                echo '<th>  City    </th>';
                echo '<th>  Gender   </th>';
            echo '</tr></thead>';
			echo '<tbody>';
			
            if (mysqli_num_rows($search_result) > 0)
            {
                while($row = mysqli_fetch_assoc($search_result))
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
        echo '</tbody>';    
        echo '</table>';
		echo '<br></br>';
		
		outputTable(filterTable($county), [ "County", "Percentage" ]);
		outputTable(filterTable($city), [ "City", "Percentage" ]);
		outputTable($summary_result, [ "Employment Status", "Percentage" ]);
		outputTable(filterTable($education), [ "Highest Grade Complete", "Percentage" ]);
        ?>
        </div>
    </div>
    </body>
</html>