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
        <ul>
            <li><a href="adminLogin.html">Log in (Admin)</a></li>
            <li><a href="login.html">Log in</a></li>
        </ul>  
    </nav>
        <div class="createForm">
            <h1>Create New Account</h1>
            <form action="insert.php" method="post">
                <h5>Log in information</h5>
                <p>
                    <label for="email">Email</label><span class="asterisk"> * </span>
                    <input type="email" name="email" id="email" class="inputForm_M">
                </p>
                <p>
                    <label for="password">Password</label><span class="asterisk"> * </span>
                    <input type="password" name="password" id="password" class="inputForm_M">
                </p>
                <p>
                    <label for="confirmPassword">Confirm Password</label><span class="asterisk"> * </span>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="inputForm_M">
                </p>
                <br><br>
                <h5>Personal Information</h5>
                <p>
                    <label for="fname">First Name</label><span class="asterisk"> * </span>
                    <input type="text" name="fname" id="fname" class="inputForm_S">
                    <label for="mname">MI</label>
                    <input type="text" name="mname" id="mname" class="inputForm_S">
                    <label for="lname">Last Name</label><span class="asterisk"> * </span>
                    <input type="text" name="lname" id="lname" class="inputForm_S">
                </p>
                <p>
                    <label for="bthday">Birthday</label><span class="asterisk"> * </span>
                    <input type="date" name="bday" id="bday" class="inputForm_S">
                    <label for="gender">Gender</label><span class="asterisk"> * </span>
                    <select name="gender" id="gender" class="inputForm_S">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="trans">Transgender</option>
                        <option value="nonBinary">Non-binary/non-conforming</option>
                        <option value="other">Prefer not to respond</option>
                    </select>
                </p>
               <p>
                <label for="address">Address</label><span class="asterisk"> * </span>
                <input type="text" name="address" id="address" class="inputForm_M">
               </p>
                <p>
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="inputForm_S">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state" class="inputForm_S">
                    <label for="zipcode">Zip Code</label>
                    <input type="number" name="zip" id="zip" class="inputForm_S">
                </p>
               <p>
                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone" class="inputForm_S">
               </p> 
               <p>
                <input type="submit" class="btn btn-primary" >
               </p>
                

            </form>
        </div>
        
        
       
    </div>
</body>
</html>