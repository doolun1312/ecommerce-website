<?php


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_URL);
$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_URL);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_URL);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_URL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_URL);
$password1 = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_URL);

echo $name;
echo $surname;
echo $username;
echo $email;
echo $password;
echo $password1;

$message = "";

$uploadFileName = $_FILES["imageToUpload"]["name"];
$imageFileType = pathinfo($uploadFileName, PATHINFO_EXTENSION);


//Check file data has been sent
if (!array_key_exists("imageToUpload", $_FILES)) {
    $message = 'File missing.';
    echo $message;
} else if ($_FILES["imageToUpload"]["name"] == "" || $_FILES["imageToUpload"]["name"] == null) {
    $message = 'File missing.';
    echo $message;
    //Specify where file will be stored
    $target_file = '../images/profilepic.jpg';
}
/*  Check if image file is a actual image or fake image
        tmp_name is the temporary path to the uploaded file. */ else {
    //Specify where file will be stored
    $target_file = '../images/' . $uploadFileName;
    if (getimagesize($_FILES["imageToUpload"]["tmp_name"]) === false) { 
        $message = "File is not an image.";
        echo $message;
        $target_file = '../images/profilepic.jpg';
    }

    // Check that the file is the correct type
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        echo $message;
        $target_file = '../images/profilepic.jpg';
    }


    /* Files are uploaded to a temporary location. 
        Need to move file to the location that was set earlier in the script */
    if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
        $message= "The file ". basename( $_FILES["imageToUpload"]["name"]). " has been uploaded.";
        echo $message;
    } else {
        $message = "Sorry, there was an error uploading your file.";
        echo $message;
    }
}
?>

<script>
    window.onload = sendData;

    function storeCustomers(message) {
        if (message == "Customer added") {
            window.location = "login.php"
        } else {
            <?php echo "error" ?>

        }
    }

    function sendData() {
        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = function() {
            //Check HTTP status code
            if (request.status == 200) {
                //Get data from server
                storeCustomers(request.responseText);

            } else
                alert("Error communicating with server: " + request.status);
        }
        var name = "<?php echo $name; ?>";
        var surname = "<?php echo $surname; ?>";
        var username = "<?php echo $username; ?>";
        var email = "<?php echo $email; ?>";
        var password = "<?php echo $password; ?>";
        var password1 = "<?php echo $password1; ?>";
        var profilepic = "<?php echo $target_file; ?>";
        // send request with variables 
        request.open("POST", "signup2.php?name=" + name + "&surname=" + surname + "&username=" + username + "&email=" + email + "&password=" + password + "&password1=" + password1 +  "&profile_picture=" + profilepic);
        request.send();
    }
</script>