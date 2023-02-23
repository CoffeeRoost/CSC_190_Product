<?php
namespace Upload;

class Upload
{
    public function uploadFile()
    {
        // Start session and check if user is logged in
        session_start();
        if (!isset($_SESSION['userID'])) {
            // Redirect user to login page if not logged in
            header("Location: ../Login.php");
            exit();
        }

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
                header("Location: ../participantDash1-2.php?error=uploadfileerror&message=$errorMessage");
                exit();
            }

            // Validate file type and size
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'ipynb'];
            $maxFileSize = 5000000; // 5MB
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExt, $allowedExtensions)) {
                header("Location: ../participantDash1-2.php?error=invalidfiletype");
                exit();
            }
            if ($fileSize > $maxFileSize) {
                header("Location: ../participantDash1-2.php?error=filetoolarge");
                exit();
            }

            // Generate unique file name and move file to uploads directory
            $newFileName = uniqid('', true) . "." . $fileExt;
            $fileDestination = 'uploads/' . $newFileName;
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                // Insert file details into database
                $userId = $_SESSION['userId'];
                $sql = "INSERT INTO files (userID, file_name, file_size, file_type, file_path)
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "issss", $userId, $fileName, $fileSize, $fileType, $fileDestination);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../participantDash1-2.php?upload=success");
                    exit();
                } else {
                    header("Location: ../participantDash1-2.php?error=sqlerror");
                    exit();
                }
            }
      } else {
          // Handle case where form was not submitted or file was not uploaded
          header("Location: ../participantDash1-2.php?error=nofileuploaded");
          exit();
      }
  }
}





?>