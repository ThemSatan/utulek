<?php 
// Create connection
/**$conn = new mysqli('localhost', 'root', '', 'adamkova');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
$statusMsg = 'uf'; 
 
// File upload directory 
$targetDir = "public/assets/kocky"; 
 
if(isset($_POST["submit"])){ 
    if(!empty($_FILES["fotografie"]["name"])){ 
        $fileName = basename($_FILES["fotografie"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
     
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["fotografie"]["tmp_name"], $targetFilePath)){ 
                // Insert image file name into database 
                $insert = $conn->query("INSERT INTO ut_kocka (fotografie) VALUES ('".$fileName."', NOW())"); 

                mysqli_query($conn, $insert);

                if($insert){ 
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully."; 
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg;**/

error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['submit'])) {
 
    $filename = $_FILES["fotografie"]["name"];
    $tempname = $_FILES["fotografie"]["tmp_name"];
    $folder = "public/assets/kocky" . $filename;
 
    $db = mysqli_connect("localhost", "root", "", "adamkova");
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO ut_kocka (fotografie) VALUES ('$filename')";
 
    // Execute query
    mysqli_query($db, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
?>