<?php
    session_start();
    include("connect.php");
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $select_statments = ("SELECT * FROM data WHERE mobile='$mobile' AND password='$password' AND role='$role'");

    $check = mysqli_query($connect, $select_statments);

    if(mysqli_num_rows($check)>0)
    {
        $userdata = mysqli_fetch_array($check);

        $select_role = ("SELECT * FROM data WHERE role='party' ");
        $partys = mysqli_query($connect, $select_role);

        $partydata = mysqli_fetch_all($partys,MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['partydata'] = $partydata;

        echo '
            <script>
                window.location = "../pages/dashboard.php";
                </script>
        ';
    }
    else 
    {
        echo '
                <script>
                    alert("Invalid Credentials or User not found");
                    window.location = "../index.html";
                </script>
            ';
    }
?>