<?php
include "connection.php";
?>

<!--
    //echo "<p>Starting</p>";
////$q = mysqli_query('SELECT MAX(student_id) as studendfst_id from `studen_registration`');
////$row = mysql_fetch_assoc($q);
////$next_auto_inc = $row['studendfst_id'] + 1;
////echo $next_auto_inc;
////
////
-->





<!DOCTYPE html>
<html lang="en">
<head><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Library</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
              rel='stylesheet'>
    </head>

</head>

<br>




<body class="login" style="margin-top: -20px;">


<?php

$sql = 'Select * from `librarian_registration` ';

if ($result=mysqli_query($link,$sql))
{
    // Fetch one and one row
    $lastId = "0";
    while ($row=mysqli_fetch_row($result))
    {
        //printf ("%s\n",$row[5]);
//        $number = $lastId.substr(3,10);

        $lastId = $row[5];
    }
    $number = substr($lastId, 3, 10);
    $number = $number + 1;

    //printf ("\nLast ID is %s\n",$lastId);
    //echo $number;
    // printf ($newStudentId);
    // Free result set
    //mysqli_free_result($result);
}


?>


<div class="col-lg-12 text-center ">
    <h1>Library Management System</h1>
</div>

<div class="login_wrapper">

    <section class="login_content" style="margin-top: -40px;">
        <form name="form1" action="LibrarianProfileDashboard.php" method="post">
            <h2>User Registration Form</h2><br>

            <div>
                <input type="text" class="form-control" placeholder="First Name" name="librarian_firstname" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Last Name" name="librarian_lastname" required=""/>
            </div>

            <div>
                <input type="text" class="form-control" placeholder="Username" name="librarian_username" required=""/>
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Password" name="librarian_password" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="email" name="librarian_email" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" value="<?php echo("USR".$number); ?>" name="librarian_id" />
            </div>

            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-info" type="submit" name="submit1" value="Register">
            </div>


        </form>
        <?php

        if(isset($_POST["submit1"])){

            mysqli_query($link,"insert into librarian_registration values('$_POST[librarian_firstname]','$_POST[librarian_lastname]','$_POST[librarian_username]','$_POST[librarian_password]','$_POST[librarian_email]','$_POST[librarian_id]')");

            ?>
            <div class="alert alert-success col-lg-6 col-lg-push-3">
                Registration User successfully
            </div>

            <?php
        }



        ?>


    </section>



</div>
</body>

</html>
