
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Career Plus</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Favicon
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="user/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="user/assets/img/favicon.png">

    <!-- Stylesheets
    ================================================== -->
    <!-- Bootstrap core CSS -->
    <link href="user/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="user/assets/css/style.css" rel="stylesheet">
    <link href="user/assets/css/responsive.css" rel="stylesheet">

</head>
<style>

body {
            background-image: url("image/home.jpg");
            background-repeat: no-repeat;
            color: white;
            background-size: cover;
        }
        .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: -1;
  }
  <style>
  #pay_button_daily {
  background-color: #2196F3;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

#pay_button_daily:hover {
  background-color: #2196F3;
}
#pay_button_weekly {
  background-color:#E91E63;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

#pay_button_weekly:hover {
  background-color: #E91E63;
}
#pay_button_monthly {
  background-color: #FF9800;
  color: white;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

#pay_button_monthly:hover {
  background-color: #FF9800;
}
.box {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    color: #333;
}

.box-heading {
    color: #f44336;
    margin-top: 0;
    margin-bottom: 10px;
}

.box p {
    margin-top: 0;
    margin-bottom: 10px;
}

.box a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f44336;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.2s;
}

.box a:hover {
    background-color: #c62828;
}
.box {
  width: 50%;
  text-align: center;
}


    </style>
<body>

    <header id="masthead" class="site-header" >
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                    <a class="site-title"><span>Career</span>Plus</a>

                </div>


                <div class="collapse navbar-collapse" id="agency-navbar-collapse">
<form method ="POST" action="">
                    <ul class="nav navbar-nav navbar-right">

                        
                        <li></li>
                            
                           <li class="active"><a href="uhome.php">HOME</a></li>
                           <li class="active"><a href="upgrade.php">Upgrade</a></li>
                           <li class="active"><a href="uclass.php">Vedio classes</a></li>
                           <li class="active"><a href="unotes.php">Notes</a></li>
                           <li class="active"><a href="viewexam.php">Attend Test</a></li>
                           <li class="active"><a href="uprofile.php">My Profile</a></li>
                           <li class="active"><a href="ufeedback.php">Feedback</a></li>
                           <li class="active"><a href="notification.php">Notifications</a></li>
                           <li><a href="logout.php">LogOut</a></li>

                    </ul>

                </div>
            </div>   
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->
<br><BR>
<div class="col-md-6">
    <?php
    include 'dbconnect.php';
 session_start();
$Test_id = $_GET['id'];
//Get test id 
//$Test_id = 1;
$qqqq = "SELECT COUNT(q_no) AS noq FROM questions WHERE testid='$Test_id'";
$mmmm = mysql_query($qqqq, $conn);
$Row = mysql_fetch_assoc($mmmm);
$NoQ = $Row['noq'];
//echo $NoQ;

if(!isset($_SESSION['NoQ']))
{
    $_SESSION['NoQ'] = $NoQ;
}

if(!isset($_SESSION['Current_Question_No']))
{
    $_SESSION['Current_Question_No'] = 1;
}else{
    $_SESSION['Current_Question_No']++;
}

$Current_Question = $_SESSION['Current_Question_No'];
//echo "CQ - ".$Current_Question;

$q = "SELECT * FROM questions WHERE testid = '$Test_id' AND q_no='$Current_Question'";
//echo $q;
$result = mysql_query($q,$conn);
$row = mysql_fetch_assoc($result); 

if($_SESSION['NoQ'] > 0)
{


?>

<form action="" method="POST">
    <?php echo $Current_Question." - ".$row['question']; ?><br>
    <input type="radio" name="<?php echo $row['question']; ?>" value="<?php echo $row['optiona']; ?>"> <?php echo $row['optiona']; ?><br>
    <input type="radio" name="<?php echo $row['question']; ?>" value="<?php echo $row['optionb']; ?>"> <?php echo $row['optionb']; ?><br>
    <input type="radio" name="<?php echo $row['question']; ?>" value="<?php echo $row['optionc']; ?>"> <?php echo $row['optionc']; ?><br>
    <input type="radio" name="<?php echo $row['question']; ?>" value="<?php echo $row['optiond']; ?>"> <?php echo $row['optiond']; ?><br>
    <input type="submit" name="submit" value="Next Question" style="background:#59e552;">
</form>
<?php
}else{ ?>
    Exam Over !!!!!
    
    <?php
}
?>
<?php
if (isset($_POST['submit'])) {
    

    $NoQ = $_SESSION['NoQ'];
    $_SESSION['NoQ'] = $NoQ - 1;

    if($NoQ == 1)
    {
        echo "<script>alert('Exam Over!');
                            location.href='ans.php?id=$Test_id';
                    </script>";
        ?>
        <br>
<a href="viewexam.php"><input type="button" value="BACK TO MAIN PAGE" style="background:red"></a>

<?php
        unset($_SESSION['Current_Question_No']);
        unset($_SESSION['NoQ']);
        session_destroy();
    }else{
        echo " ";
    }

    

}