<?php
include("connect.php"); 

$name = $_POST["name"];
$mobile = $_POST['mobile1'];
$password = $_POST['password1'];
$confpassword = $_POST['confpassword'];
$aadhar = $_POST['aadhar'];
$age = $_POST['age'];
$address = $_POST['address'];
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$role = $_POST['role'];

$ages = 0;
$mobiles = 0;
$aadhars =0;

// Validation function
function validation($age, $mobile,$aadhar) {
    global $ages, $mobiles,$aadhars;
    
    if ($age < 18) {
        $ages++;
    }
    
    if (strlen($mobile) != 10) {
        $mobiles++;
    }
    
    if (strlen($aadhar) != 14) {
        $aadhars++;
    }
    

    if ($ages == 1 && $mobiles == 1 && $aadhars ==1) {
        echo '
        <script>
            alert("Age must be greater than 18 \n Mobile number length must be exactly 10 digits. \n Aadhar number length must be exactly 14 digits. ");
            window.location = "../pages/register.html";
        </script>
        ';
        exit();
    } elseif ($ages == 1) {
        echo '
        <script>
            alert("Age must be greater than 18.");
            window.location = "../pages/register.html";
        </script>
        ';
        exit();
    } 
    elseif ($mobiles == 1) {
        echo '
        <script>
            alert("Mobile number length must be exactly 10 digits.");
            window.location = "../pages/register.html";
        </script>
        ';
        exit();
    }
    elseif ($aadhars == 1) {
        echo '
        <script>
            alert("Aadhars number length must be exactly 14 digits.");
            window.location = "../pages/register.html";
        </script>
        ';
        exit();
    }


}

// Validate password match
if ($password == $confpassword) {
    // Perform validation
    if(validation($age, $mobile,$aadhar));
    // Move file only if validation passes
    if (move_uploaded_file($tmp_name, "../uploads/$image")) {
        $insert_statement = "INSERT INTO data (name, mobile, password, aadhar, age, address, image, role, status, votes) VALUES ('$name', '$mobile', '$password', '$aadhar', '$age', '$address', '$image', '$role', 0, 0)";
        $insert = mysqli_query($connect, $insert_statement);
        
        if ($insert) {
            echo '
            <script>
                alert("Registration successful!");
                window.location = "../index.html";
            </script>
            ';
        } else {
            echo '
            <script>
                alert("Some error occurred!");
                window.location = "../pages/register.html";
            </script>
            ';
        }
    } else {
        echo '
        <script>
            alert("File upload failed!");
            window.location = "../pages/register.html";
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("Password and Confirm Password do not match!");
        window.location = "../pages/register.html";
    </script>
    ';
}
?>
