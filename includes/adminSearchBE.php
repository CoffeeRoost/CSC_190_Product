<?php
    session_start();
    if (!isset($_SESSION['adminLogin'])){
             //if error, force a logout
            session_unset();
            session_destroy();
            header ("Location: ./LoginAd.php");
            exit();
    }
    require './dbh.inc.php';

    if(isset($_POST['SearchingRole'])){
        if($_POST['SearchingRole'] === "employee"){

            $_SESSION['empSearchID'] = $_POST['searchID'];
            $_SESSION['empSearchFname'] = $_POST['searchFname'];
            $_SESSION['empSearchMI'] = $_POST['searchMI'];
            $_SESSION['empSearchLname'] = $_POST['searchLname'];
            $_SESSION['empSearchStreet'] = $_POST['searchStreet'];
            $_SESSION['empSearchCity'] = $_POST['searchCity'];
            $_SESSION['empSearchCounty'] = $_POST['searchCounty'];
            $_SESSION['empSearchState'] = $_POST['searchState'];
            $_SESSION['empSearchZip'] = $_POST['searchZip'];
            $_SESSION['empSearchPhone'] = $_POST['searchPhone'];
            $_SESSION['empSearchEmail'] = $_POST['searchEmail'];
            $_SESSION['empSearchRace'] = $_POST['searchRace'];
            $_SESSION['empSearchGender'] = $_POST['searchGender'];
            $_SESSION['empSearchProgramMember'] = $_POST['searchProgramMember'];

            /*echo $_SESSION['empSearchID']; 
            echo $_SESSION['empSearchFname']; 
            echo $_SESSION['empSearchMI'] ;
            echo $_SESSION['empSearchLname'] ;
            echo $_SESSION['empSearchStreet'] ;
            echo $_SESSION['empSearchCity'] ;
            echo $_SESSION['empSearchCounty'] ;
            echo $_SESSION['empSearchingState'] ;
            echo $_SESSION['empSearchZip'] ;
            echo $_SESSION['empSearchEmail'] ;
            echo $_SESSION['empSearchRace'];
            echo $_SESSION['empSearchGender'];
            echo $_SESSION['empSearchProgramMember'];*/

            $conditions = array();
            $parameters = array();
            $types = "";

            if(!empty($_SESSION['empSearchID'])){
                $conditions[] = "employeeID = ?";
                $parameters[] = $_SESSION['empSearchID'];
                $types .= "i";
            }

            if(!empty($_SESSION['empSearchFname'])){
                $conditions[] = "empfname = ?";
                $parameters[] = $_SESSION['empSearchFname'];
                $types .= "s";
            }

            if(!empty($_SESSION['empSearchMI'])){
                $conditions[] = "empMI = ?";
                $parameters[] = $_SESSION['empSearchMI'];
                $types .= "s";
            }

            if(!empty($_SESSION['empSearchLname'])){
                $conditions[] = "emplname = ?";
                $parameters[] = $_SESSION['empSearchLname'];
                $types .= "s";
            }
            
  
            if(!empty($_SESSION['empSearchStreet'])){
                $conditions[] = "empStreet = ?";
                $parameters[] = $_SESSION['empSearchStreet'];
                $types .= "s";
            }

            if(!empty($_SESSION['empSearchCity'])){
                $conditions[] = "empCity = ?";
                $parameters[] = $_SESSION['empSearchCity'];
                $types .= "s";
            }

            if(!empty($_SESSION['empSearchZip'])){
                $conditions[] = "empZipcode = ?";
                $parameters[] = $_SESSION['empSearchZip'];
                $types .= "s";
            }

            if(!empty($_SESSION['empSearchState'])){
                $conditions[] = "empState = ?";
                $parameters[] = $_SESSION['empSearchState'];
                $types .= "s";
            }
            
            
            if(!empty($_SESSION['empSearchEmail'])){
                $conditions[] = "email = ?";
                $parameters[] = $_SESSION['empSearchEmail'];
                $types .= "s";
            }

            if(!empty($_SESSION['empSearchRace'])){
                $conditions[] = "empRaces = ?";
                $parameters[] = $_SESSION['empSearchRace'];
                $types .= "s";
            }

            if(!empty($_SESSION['empSearchGender'])){
                $conditions[] = "empGender = ?";
                $parameters[] = $_SESSION['empSearchGender'];
                $types .= "s";
            }

            if(!empty($_SESSION['empSearchProgramMember'])){
                $conditions[] = "programMember = ?";
                $parameters[] = $_SESSION['empSearchProgramMember'];
                $types .= "s";
            }
            
            if(!empty($_SESSION['empSearchCounty'])){
                $conditions[] = "empCounty = ?";
                $parameters[] = $_SESSION['empSearchCounty'];
                $types .= "s";
            }

            if (!empty($conditions)) {
                $query .= " SELECT * FROM EMPLOYEE WHERE " . implode(" AND ", $conditions);
                $query .= ";";
                $_SESSION['searchingQuery'] = $query;
                $_SESSION['prepareTypes'] = $types;               
            }
            else {
                header("Location: ../adminSearchOption.php");
                exit();
            }

            
            if (!empty($parameters)) {
               $_SESSION['param']  = $parameters;
            }
            
            header("Location: ../adminSearchResult.php");

        }

        if($_POST['SearchingRole'] === "client"){

            $_SESSION['ClientSearchID'] = $_POST['searchID'];
            $_SESSION['ClientSearchFname'] = $_POST['searchFname'];
            $_SESSION['ClientSearchMI'] = $_POST['searchMI'];
            $_SESSION['ClientSearchLname'] = $_POST['searchLname'];
            $_SESSION['ClientSearchStreet'] = $_POST['searchStreet'];
            $_SESSION['ClientSearchCity'] = $_POST['searchCity'];
            $_SESSION['ClientSearchCounty'] = $_POST['searchCounty'];
            $_SESSION['ClientSearchState'] = $_POST['searchState'];
            $_SESSION['ClientSearchZip'] = $_POST['searchZip'];
            $_SESSION['ClientSearchPhone'] = $_POST['searchPhone'];
            $_SESSION['ClientSearchEmail'] = $_POST['searchEmail'];
            $_SESSION['ClientSearchRace'] = $_POST['searchRace'];
            $_SESSION['ClientSearchGender'] = $_POST['searchGender'];
            $_SESSION['ClientSearchProgram'] = $_POST['searchProgramMember'];

            $conditions = array();
            $parameters = array();
            $ethnicity = array();
            $types = "";

            if(!empty($_SESSION['ClientSearchID'])){
                $conditions[] = "P.userID = ?"; /*Because PARTICIPATION AS P*/
                $parameters[] = $_SESSION['ClientSearchID'];
                $types .= "i";
            }

            if(!empty($_SESSION['ClientSearchFname'])){
                $conditions[] = "fname = ?";
                $parameters[] = $_SESSION['ClientSearchFname'];
                $types .= "s";
            }

            if(!empty($_SESSION['ClientSearchMI'])){
                $conditions[] = "MI = ?";
                $parameters[] = $_SESSION['ClientSearchMI'];
                $types .= "s";
            }

            if(!empty($_SESSION['ClientSearchLname'])){
                $conditions[] = "lname = ?";
                $parameters[] = $_SESSION['ClientSearchLname'];
                $types .= "s";
            }

            if(!empty($_SESSION['ClientSearchEmail'])){
                $conditions[] = "email = ?";
                $parameters[] = $_SESSION['ClientSearchEmail'];
                $types .= "s";
            }

            if(!empty($_SESSION['ClientSearchGender'])){
                $conditions[] = "empGender = ?";
                $parameters[] = $_SESSION['empSearchGender'];
                $types .= "s";
            }

            if(!empty($_SESSION['ClientSearchRace'])){
                $string = strtolower($_SESSION['ClientSearchRace']);

                if (strpos($string, "asian") !== false) {
                    $conditions[] = "asian = ?";
                    $parameters[] = "Yes";
                    $types .= "s";
                    $ethnicity[] = "Asian";
                }

                if (strpos($string, "hispanic") !== false) {
                    $conditions[] = "hispanicHeritage = ?";
                    $parameters[] = "Yes";
                    $types .= "s";
                    $ethnicity[] = "Hispanic";
                }

                if ((strpos($string, "black") !== false) || (strpos($string, "african") !== false)) {
                    $conditions[] = "africanAmercian_black = ?";
                    $parameters[] = "Yes";
                    $types .= "s";
                    $ethnicity[] = "Black";
                }

                if ((strpos($string, "native") !== false) || ((strpos($string, "India") !== false) && (strpos($string, "America") !== false)) || (strpos($string, "Alaska") !== false)) {
                    $conditions[] = "americanIndian_alaskanNative = ?";
                    $parameters[] = "Yes";
                    $types .= "s";
                    $ethnicity[] = "Native American";
                }

                if ((strpos($string, "hawaiian") !== false) || (strpos($string, "islander") !== false) || (strpos($string, "pacific") !== false)) {
                    $conditions[] = "hawaiian_other = ?";
                    $parameters[] = "Yes";
                    $types .= "s";
                    $ethnicity[] = "Hawaiian and Other";
                }

                if (strpos($string, "white") !== false) {
                    $conditions[] = "white = ?";
                    $parameters[] = "Yes";
                    $types .= "s";
                    $ethnicity[] = "White";
                }

                if((strpos($string, "asian") === false) && (strpos($string, "hispanic") === false) && (strpos($string, "black") === false) && (strpos($string, "african") === false) && (strpos($string, "native") === false) && ((strpos($string, "India") === false) && (strpos($string, "America") === false)) && (strpos($string, "Alaska") === false) && (strpos($string, "hawaiian") === false) && (strpos($string, "islander") === false) && (strpos($string, "pacific") === false) && (strpos($string, "white") === false)){
                    $conditions[] = "noAnswer = ?";
                    $parameters[] = "Yes";
                    $types .= "s";
                    $ethnicity[] = "N/A";
                }
                
                $_SESSION['ethnicity'] = "".implode(", ", $ethnicity);
            }

            if(!empty($_SESSION['ClientSearchProgram'])){
                $conditions[] = "programPartnerReference = ?";
                $parameters[] = $_SESSION['empSearchProgramMember'];
                $types .= "s";
            }
            
  
            if(!empty($_SESSION['ClientSearchStreet'])){
                $conditions[] = "street = ?";
                $parameters[] = $_SESSION['ClientSearchStreet'];
                $types .= "s";
            }

            if(!empty($_SESSION['ClientSearchCity'])){
                $conditions[] = "city = ?";
                $parameters[] = $_SESSION['ClientSearchCity'];
                $types .= "s";
            }

            if(!empty($_SESSION['ClientSearchZip'])){
                $conditions[] = "zipcode = ?";
                $parameters[] = $_SESSION['ClientSearchZip'];
                $types .= "s";
            }

            if(!empty($_SESSION['ClientSearchState'])){
                $conditions[] = "state = ?";
                $parameters[] = $_SESSION['ClientSearchState'];
                $types .= "s";
            }
            
            if(!empty($_SESSION['ClientSearchCounty'])){
                $conditions[] = "county = ?";
                $parameters[] = $_SESSION['ClientSearchCounty'];
                $types .= "s";
            }

            if (!empty($conditions)) {
                $query .= "SELECT * FROM PARTICIPATION AS P JOIN ADDRESS AS A ON P.userID = A.userID JOIN ETHNICITY AS E ON A.userID = E.userID WHERE " . implode(" AND ", $conditions);
                $query .= ";";
                $_SESSION['searchingQuery'] = $query;
                $_SESSION['prepareTypes'] = $types;
                echo $query;               
            }
            else {
                header("Location: ../adminSearchOption.php");
                exit();
            }

            
            if (!empty($parameters)) {
               $_SESSION['param']  = $parameters;
            }
            
            header("Location: ../clientSearchResult.php");

        }

    }
    else {
        header("Location: ../adminSearchOption.php");
        exit();
    }   
?>
