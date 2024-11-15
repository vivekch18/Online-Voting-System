<?php
    session_start();
    include("connect.php");
    
    $votes = $_POST['pvotes'];
    
    $total_votes = $votes+1;
    
    $pid = $_POST['pid'];
    $uid = $_SESSION['userdata']['id'];

    $update_statements =  ("UPDATE data SET votes='$total_votes' WHERE id='$pid'");
    $update_votes = mysqli_query($connect, $update_statements);


    $update = ("UPDATE data SET status=1 WHERE id='$uid' ");
    $update_user_status = mysqli_query($connect, $update);

    if($update_votes and $update_user_status)
    {
        $party = mysqli_query($connect, "SELECT * FROM data WHERE role='party'");
        $partydata = mysqli_fetch_all($party, MYSQLI_ASSOC);
        $_SESSION['userdata']['status'] = 1;
        $_SESSION['partydata'] = $partydata;
        
        echo '
            <script>
                alert("voting successfully:)");
                window.location="../pages/dashboard.php";
                alert($total_votes);
            </script>
';
    }
else
{
    echo '
    <script>
        alert("Some error occurs!!");
        window.location = "../pages/dashboard.php";
    </script>
';
}
?>