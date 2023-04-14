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

            $_SESSION['empSearchID'] = $_POST['empSearchID'];
            $_SESSION['empSearchFname'] = $_POST['empSearchFname'];
            $_SESSION['empSearchMI'] = $_POST['empSearchMI'];
            $_SESSION['empSearchLname'] = $_POST['empSearchLname'];
            $_SESSION['empSearchStreet'] = $_POST['empSearchStreet'];
            $_SESSION['empSearchCity'] = $_POST['empSearchCity'];
            $_SESSION['empSearchCounty'] = $_POST['empSearchCounty'];
            $_SESSION['empSearchState'] = $_POST['empSearchState'];
            $_SESSION['empSearchZip'] = $_POST['empSearchZip'];
            $_SESSION['empSearchEmail'] = $_POST['empSearchEmail'];
            $_SESSION['empSearchRace'] = $_POST['empSearchRace'];
            $_SESSION['empSearchGender'] = $_POST['empSearchGender'];
            $_SESSION['empSearchProgramMember'] = $_POST['empSearchProgramMember'];

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

    }
    else {
        header("Location: ../adminSearchOption.php");
        exit();
    }   
?>
