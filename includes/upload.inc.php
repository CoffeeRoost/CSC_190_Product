<?php



        //Start session
        session_start();

        // Include database connection
        require_once 'dbh.inc.php';

        // Check if form was submitted and file was uploaded
        if (isset($_POST['submit']) && isset($_FILES['fileToUpload'])) {
            // Get file details
            $fileName = $_FILES['fileToUpload']['name'];
            $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
            $fileSize = $_FILES['fileToUpload']['size'];
            $fileType = $_FILES['fileToUpload']['type'];
            $fileError = $_FILES['fileToUpload']['error'];

            // Check for errors
            if ($fileError !== UPLOAD_ERR_OK) {
                // Handle file upload error
                $errorMessages = [
                    UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                    UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                    UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
                    UPLOAD_ERR_NO_FILE => 'No file was uploaded',
                    UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
                    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                    UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload'
                ];
                $errorMessage = $errorMessages[$fileError] ?? 'Unknown error uploading file';
                $_SESSION['upload_error']=$errorMessage;
                header("Location: ../participantDash1-2.php?error=uploadfileerror&message=$errorMessage");
                exit();
            }

            // Validate file type and size
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'ipynb','pdf','docx','doc','txt','xlsx','pptx','sql'];
            $maxFileSize = 5000000; // 5MB
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExt, $allowedExtensions)) {
                $_SESSION['upload_error'] = 'Invalid file type. Only JPG, JPEG, PNG, GIF, IPYNB, pdf, docx/doc,txt,xlsx,pptx,sql files are allowed.';
                 header("Location: ../participantDash1-2.php?error=invalidfiletype");
                exit();
            }
            if ($fileSize > $maxFileSize) {
                $_SESSION['upload_error'] = 'File size exceeds limit of 5MB.';

                header("Location: ../participantDash1-2.php?error=filetoolarge");
                exit();
            }

            // Generate unique file name and move file to uploads directory

            $newFileName = uniqid() . '_' . $fileName; // Generate a unique file name
            $fileDestination = 'uploads/' . $newFileName;

            // Check if file with same name already exists
            if (file_exists($fileDestination)) {
                unlink($fileDestination); // Delete existing file
            }
            if (!file_exists('uploads')) {
                mkdir('uploads');
            }

            if (move_uploaded_file($fileTmpName, $fileDestination))  {
                // Insert file details into database
                $userId = $_SESSION['userID'];
                $sql = "INSERT INTO files (userID, file_name, file_size, file_type, file_path)
                        VALUES (?, ?, ?, ?, ?)
                        ON DUPLICATE KEY UPDATE
                        file_size = VALUES(file_size),
                        file_type = VALUES(file_type),
                        file_path = VALUES(file_path)";

                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("isiss", $userId, $fileName, $fileSize, $fileType, $fileDestination);
                    $stmt->execute();
                    $_SESSION['upload_success'] = 'File uploaded successfully.';

                    header("Location: ../participantDash1-2.php?upload=success");
                    exit();
                } else {
                    $_SESSION['upload_error']='SQL Error, please try again!';
                    header("Location: ../participantDash1-2.php?error=sqlerror");
                    exit();
                }
            }
      } else {
          // Handle case where form was not submitted or file was not uploaded
          $_SESSION['upload_error']='No file uploaded, please upload the file!';
          header("Location: ../participantDash1-2.php?error=nofileuploaded");
          exit();
      }





?>