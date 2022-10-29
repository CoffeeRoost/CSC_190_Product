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
        <div class="resetPass">
            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator)){
                    echo "selector or validator empty!";
                }
                else{
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                        ?>
                            <form action="includes/resetPass.inc.php" method="post">
                                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                                <input type="password" name="password" placeholder="Enter a new password...">
                                <input type="password" name="passRepeat" placeholder="Repeat password...">
                                <button type="submit" name="resetPassSubmit">Submit</button>
                            </form>

                        <?php
                    }
                }
            ?>
        </div>  
    </div>
</body>
</html>