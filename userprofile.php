<?php include("./header.php"); 
include("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" href="./images/icon.png" />

    <title>User Profile</title>
</head>

<body>
    <section id="page-name">

        <div class="container h-200">
            <div class="row">
                <div class="col mt-5 text-center">
                    <h1>My Profile</h1>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container bg-light py-5">

            <div class="row py-3">
                <div class="col text-center">
                    <h3>USER INFO </h3>
                    <span class="line"></span>
                </div>
            </div>

            <div class="row m-5 ">
                <div class="col justify-content-around cardchage">
                    <div class="card ms-auto  ">
                        <h1 class="text-center mt-3 text-center">Details</h1>

                        <?php 
                                $query="SELECT * FROM user WHERE ID=".$_SESSION['u_id'];
                                $result=mysqli_query($con,$query);
                                while($row=mysqli_fetch_array($result))
                                {
                        ?>


                        <form id="userchangeprofileform" method="POST" action="./updateUserprofile.php">

                            <div class="m-5 border-3 ">
                             <input type="text" id="user_name" name="user_name" class="form-control"  placeholder="Youe Name"
                                    Value="<?php echo $row[1]?>">
                                    
                            </div>
                            <div class="m-5 border-3">
                                <input type="text" id="user_email" name="user_email" class="form-control"
                                    placeholder="Youe Email" Value="<?php echo $row[3]?>" disabled />
                            </div>
                            <div class="m-5 border-3 ">
                                <input type="text" id="user_number" name="user_number" class="form-control"
                                    placeholder="Your Number" Value="<?php echo $row[2]?>" />
                            </div>
                            <div class="m-5 border-3">
                            <label>Gender: </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male"   <?php echo ($row[4] == "male" ? 'checked="checked"': '' ); ?>>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" <?php echo ($row[4] == "female" ? 'checked="checked"': '' ); ?>>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                            </div>
                            <div class="m-5 border-3">
                                <input type="password" id="user_password" name="user_password" class="form-control"
                                    placeholder="Youe Password" disabled Value="<?php echo $row[5]?>" />
                            </div>
                            <div class="m-5 border-3 text-center">
                            <button type="submit" class="btn allbtn btn-block mb-4 ">Update</button>
                            </div>
                        </form>

                        <?php }?>

                    </div>
                </div>
            </div>

            
            <div class="row m-5 ">
                <div class="col justify-content-around cardchage">
                    <div class="card ms-auto text-center ">
                        <h1 class="text-center mt-3">Change Password</h1>
                        <form id="userchangepassform" method="POST" action="./userchangepassword.php">

                            <div class="m-5 border-3 ">
                                <input type="password" id="uoldpassword" name="uoldpassword" class="form-control"
                                    placeholder="Old Password...." />
                                <label for="uoldpasswordmsg" id="uoldpasswordmsg" class="d-none errmsg form-label">Old
                                    password is Required</label>
                            </div>

                            <div class="m-5 border-3">
                                <input type="password" id="unewpassword" name="unewpassword" class="form-control"
                                    placeholder="New Password...." />
                                <label for="unewpasswordmsg" id="unewpasswordmsg" class="d-none errmsg form-label">New
                                    password is Required</label>

                            </div>
                            <div class="m-5 border-3">
                                <input type="password" id="unewcpassword" name="unewcpassword" class="form-control"
                                    placeholder="Confirm Password...." />
                                <label for="uconpassmsg" id="uconpassmsg" class="d-none errmsg form-label">Confirm
                                    password is Required</label>

                            </div>

                            <button type="submit" class="btn allbtn btn-block mb-4">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>







    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
    <script src="./javascript/Userprofilevalidation.js"></script>
</body>

</html>
<?php include("./footer.php"); ?>