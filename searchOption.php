<?php
    session_start();
    if (!isset($_SESSION['employeeID'])){
         //if error, force a logout
        session_unset();
        session_destroy();
        header ("Location: ./LoginAd.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
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
                <a href="index.php" class = "navbar-brand"><img class="logo" src="image/CMC-logo-horizontal(1).png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white fs-4 mx-4" href="./includes/logout.inc.php">Logout</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </section>
	<div class="d-flex">
        <div class="d-flex flex-column flex-shrink-1 align-items-center bg-lightBlue w-300" id="sideBar">
            <div>
                <ul class="nav nav-tabs flex-column align-items-center text-center">
                    <li class="nav-item bg-Blue mt-1 mb-md-1">
                        <a href="./employeeDash.php" class="nav-link text-white">
                            Dashboard
                        </a>
                    </li>
                          <li class="nav-item bg-Blue mb-md-1">
                            <a href="./employeePersonalInformationView.php" class="nav-link text-white">
                                Personal Information
                            </a>
                          </li>

                          <li class="nav-item bg-Blue mb-md-1">
                        <a href="./reportActivity.php" class="nav-link text-white">
                            Activity Reporting
                        </a>
		      	</li>
                      </ul>
                </div>
            </div>

	<div class="container"><br></br><br></br>


<?php

$search_result = "";


$query = "SELECT ADDRESS.userID, fname, lname, email, primaryPhone AS phone, street AS address, city, gender FROM PARTICIPATION JOIN ADDRESS ON PARTICIPATION.userID = ADDRESS.userID";
$summary = "SELECT COUNT(*) AS Count, 100.0 * COUNT(*) / SUM(COUNT(*)) OVER () AS Percentage, employmentStatus AS `Employment Status` FROM EMPLOYMENT GROUP BY employmentStatus";
$education = "SELECT COUNT(*) AS count, 100.0 * COUNT(*) / SUM(COUNT(*)) OVER () AS Percentage, highestGradeComplete AS `Highest Grade Complete` FROM EDUCATION GROUP BY highestGradeComplete";
$county = "SELECT COUNT(*) AS count, 100.0 * COUNT(*) / SUM(COUNT(*)) OVER () AS Percentage, County FROM ADDRESS GROUP BY County";
$city = "SELECT COUNT(*) AS count, 100.0 * COUNT(*) / SUM(COUNT(*)) OVER () AS Percentage, city FROM ADDRESS GROUP BY city";
$zip = "SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, zipcode as `ZIP Code` FROM ADDRESS GROUP BY zipcode";
$language = "SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, primaryLanguage as `Primary Language` FROM ETHNICITY GROUP BY primaryLanguage";
$citizenship = "SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, usCitizenshipStatus as `US Citizenship Status` FROM CITIZEN GROUP BY usCitizenshipStatus";
$disability="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, IsDisability as `Has Disability` FROM HARDSHIP GROUP BY IsDisability";
$military="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, currentMilitaryOrVet as `Current Military or Veteran` FROM EMPLOYMENT GROUP BY currentMilitaryOrVet";
$military_spouse="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, militarySpouse as `Military Spouse` FROM EMPLOYMENT GROUP BY militarySpouse";
$unemploy_insurance="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, unemployemntInsurance as `Unemployment Insurance` FROM EMPLOYMENT GROUP BY unemployemntInsurance";
$farm_worker="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, farmworker12Months as `Farm Worker` FROM EMPLOYMENT GROUP BY farmworker12Months";
$foster_care="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, fosterCare as `Foster Care support` FROM SERVICES GROUP BY fosterCare";
$adult_WIOA="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, adultEducationWIOATittleII as `Adult Education WIOA` FROM SERVICES GROUP BY adultEducationWIOATittleII";
$youth_build="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, youthBuild as `Youth Build services` FROM SERVICES GROUP BY youthBuild";
$job_corps="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, jobCorps as `Job Corps services` FROM SERVICES GROUP BY jobCorps";
$carl="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, vocationalEducationCarlPerkins as `Carl Perkins recipient` FROM SERVICES GROUP BY vocationalEducationCarlPerkins";
$tanf="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, tanfRecipient as `TANF recipient` FROM SERVICES GROUP BY tanfRecipient";
$ssi="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, ssiRecipient as `SSI Recipient` FROM SERVICES GROUP BY ssiRecipient";
$ga="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, gaRecipient as `GA Recipient` FROM SERVICES GROUP BY gaRecipient";
$snap_calfresh="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, snapRecipientCalFresh as `SNAP CALFRESH Recipient` FROM SERVICES GROUP BY snapRecipientCalFresh";
$rca="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, rcaRecipient as `RCA Recipient` FROM SERVICES GROUP BY rcaRecipient";
$ssdi="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, ssdiRecipient as `SSDI Recipient` FROM SERVICES GROUP BY ssdiRecipient";
$pell="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, pellGrant as `Pell Grant Recipient` FROM SERVICES GROUP BY pellGrant";
$ticket_to_work="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, ticketToWork as `Ticket to Work` FROM HARDSHIP GROUP BY ticketToWork";
$homeless_status="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, homelessStatus as `Experiencing Homelessness` FROM HARDSHIP GROUP BY homelessStatus";
$ex_offender="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, exOffender as `Ex-Offender` FROM HARDSHIP GROUP BY exOffender";
$homemaker="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, displacedHomemaker as `Displaced Homemaker` FROM HARDSHIP GROUP BY displacedHomemaker";
$single_parent="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, singleParent as `Single Parent` FROM HARDSHIP GROUP BY singleParent";
$cultural_barriers="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, culturalBarriers as `Cultural Barriers` FROM HARDSHIP GROUP BY culturalBarriers";
$family_size="SELECT count(*) AS count, 100.0 * count(*) / sum(count(*)) OVER () AS Percentage, familySize as `Family Size` FROM HARDSHIP GROUP BY familySize";
$search_result = filterTable($query);
$summary_result = filterTable($summary);

//connection to database and query execution
function filterTable($query) {
    require 'includes/dbh.inc.php';

    //$connect = new mysqli($servername, $dBUsername, $dBPassword,
    $filter_Result = mysqli_query($conn, $query);
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
		    echo '<th>  UserID   </th>';
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
			  echo '<tr> <td>' . $row["userID"] . '</td>';
                    echo '<td>' . $row["fname"] . '</td>';
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
		outputTable(filterTable($zip), [ "ZIP Code", "Percentage" ]);
		outputTable(filterTable($language),[ "Primary Language", "Percentage" ]);
		outputTable(filterTable($citizenship),[ "US Citizenship Status", "Percentage" ]);
		outputTable(filterTable($disability),[ "Has Disability", "Percentage" ]);
		outputTable(filterTable($military),[ "Current Military or Veteran", "Percentage" ]);
		outputTable(filterTable($military_spouse),[ "Military Spouse", "Percentage" ]);
		outputTable(filterTable($unemploy_insurance),[ "Unemployment Insurance", "Percentage" ]);
		outputTable(filterTable($farm_worker),[ "Farm Worker", "Percentage" ]);
		outputTable(filterTable($foster_care),[ "Foster Care support", "Percentage" ]);
		outputTable(filterTable($adult_WIOA),[ "Adult Education WIOA", "Percentage" ]);
		outputTable(filterTable($youth_build),[ "Youth Build services", "Percentage" ]);
		outputTable(filterTable($job_corps),[ "Job Corps services", "Percentage" ]);
		outputTable(filterTable($carl),[ "Carl Perkins recipient", "Percentage" ]);
		outputTable(filterTable($tanf),[ "TANF recipient", "Percentage" ]);
		outputTable(filterTable($ssi),[ "SSI Recipient", "Percentage" ]);
		outputTable(filterTable($ga),[ "GA Recipient", "Percentage" ]);
		outputTable(filterTable($snap_calfresh),[ "SNAP CALFRESH Recipient", "Percentage" ]);
		outputTable(filterTable($rca),[ "RCA Recipient", "Percentage" ]);
		outputTable(filterTable($ssdi),[ "SSDI Recipient", "Percentage" ]);
		outputTable(filterTable($pell),[ "Pell Grant Recipient", "Percentage" ]);
		outputTable(filterTable($ticket_to_work),[ "Ticket to Work", "Percentage" ]);
		outputTable(filterTable($homeless_status),[ "Experiencing Homelessness", "Percentage" ]);
		outputTable(filterTable($ex_offender),[ "Ex-Offender", "Percentage" ]);
		outputTable(filterTable($homemaker),[ "Displaced Homemaker", "Percentage" ]);
		outputTable(filterTable($single_parent),[ "Single Parent", "Percentage" ]);
		outputTable(filterTable($cultural_barriers),[ "Cultural Barriers", "Percentage" ]);
		outputTable(filterTable($family_size),[ "Family Size", "Percentage" ]);
        ?>
        </div>
    </div>
    </body>
</html>
