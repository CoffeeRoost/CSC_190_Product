<!DOCTYPE html>

<html lang="en">

<head>
        <meta charset="UTF-8">
        <title>Employee Information</title>
</head>

<body style="font-family: Arial, sans-serif;">  <!-- Specifies font-->

    
    <h3 style="padding-top:20px; text-align: center;">EMPLOYEE INFORMATION</h2> <!-- Specifies font-->

<!-- EMPLOYEE Info-->
<!-- Implementation of Database still needed-->
<hr>
<table style="width: 100%; margin-bottom: 20px;">
        <tr>
                <td style="width: 10%; font-weight: bold;">Last Name:</td>  
                <td><?php echo $lname; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">First Name:</td>
                <td><?php echo $fname; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">Middle Name:</td>
                <td><?php echo $Mname; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">Address:</td>
                <td><?php echo $address; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">Date of Birth:</td>
                <td><?php echo $DateOfBirth; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">Gender:</td>
                <td><?php echo $Gender; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">Race:</td>
                <td><?php echo $Race; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">Email:</td>
                <td><?php echo $Email; ?></td>
        </tr>
</table>
<hr>

<h3 style="text-align: center;">COMPANY DETAILS</h3>

<table style="width: 100%; margin-bottom: 20px;">
        <tr>
                <td style="width: 10%; font-weight: bold;">Employee Role:</td>
                <td><?php echo $employeeRole; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">Employee ID:</td>
                <td><?php echo $employeeID; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">User Password:</td>
                <td><?php echo $userPassword; ?></td>
        </tr>
        <tr>
                <td style="width: 10%; font-weight: bold;">Program Member:</td>
                <td><?php echo $programMember; ?></td>
        </tr>
</table>

</body>
</html>