<?php
    // include("connect.php");
    session_start();
    if(!isset($_SESSION['userdata']))
    {
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $partydata = $_SESSION['partydata'];

    if($_SESSION['userdata']['status']==0)
    {
        $status = '<b style="color:red">Not Voted</b>';
    }
    else
    {
        $status = '<b style="color:green">Voted</b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evoting.gov.in - Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Custom Styles (Optional) -->
    <link rel="stylesheet" href="../css/stylesheet.css">

    <style>
        body {
            background-color: #f4f6f9;
        }

        #mainsection {
            padding: 20px;
            background-color: #003366; /* Dark blue background */
            color: white;
        }

        h1 {
            font-family: cursive;
        }

        #logoutbtn {
            position: absolute;
            top: 20px;
            right: 20px;
            border-radius: 5px;
            background-color: #ffa502;
            color: black;
        }

        #profile {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }

        #party {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        #profileimg {
            border-radius: 50%;
        }

        #votebtn {
            background-color: #ffa502;
            color: black;
            padding: 5px 20px;
            border-radius: 5px;
            width: 100%;
        }

        #voted {
            background-color: #4cd137;
            color: aliceblue;
            padding: 5px 20px;
            border-radius: 5px;
            width: 100%;
        }

        .party-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .status-text {
            font-weight: bold;
        }

        @media (max-width: 768px) {
            #profile {
                width: 100%;
                margin-bottom: 20px;
            }
            #party {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div id="mainsection">
    <h1 class="text-center">Online Voting System</h1>
    <hr>
</div>

<!-- Logout Button -->
<a href="logout.php"><button id="logoutbtn" class="btn">Logout</button></a>

<div class="container mt-5">
    <div class="row">
        <!-- Profile Section -->
        <div class="col-md-4">
            <div id="profile">
                <center><img src="../uploads/<?php echo $userdata['image']?>" height="140" width="140" id="profileimg" class="mb-3"></center>
                <b>Name: </b><?php echo $userdata['name'] ?><br>
                <b>Mobile: </b><?php echo $userdata['mobile'] ?><br>
                <b>Address: </b><?php echo $userdata['address'] ?><br>
                <b>Status: </b><span class="status-text"><?php echo $status ?></span>
            </div>
        </div>

        <!-- Party Voting Section -->
        <div class="col-md-8">
            <?php
                if($_SESSION['partydata'])
                {
                    foreach ($partydata as $party) {
            ?>
                        <div id="party" class="mb-4">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="../uploads/<?php echo $party['image'] ?>" class="party-img">
                                </div>
                                <div class="col-md-10">
                                    <b>Party Name: </b><?php echo $party['name'] ?><br>
                                    <b>Votes: </b><?php echo $party['votes'] ?><br>

                                    <form action="../api/vote.php" method="POST">
                                        <input type="hidden" name="pvotes" value="<?php echo $party['votes']?>">
                                        <input type="hidden" name="pid" value="<?php echo $party['id']?>">
                                        <?php
                                            if($_SESSION['userdata']['status']==0)
                                            {
                                                ?>
                                                <input type="submit" name="votebtn" value="Vote" id="votebtn" class="btn">
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <button disabled type="button" name="votebtn" value="vote" id="voted" class="btn">Voted</button>
                                                <?php
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
