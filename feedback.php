<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();
    
    
?>

<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    
    <title>Feedback System</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
     <!-- This page plugin CSS -->
     <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <style>
    .contact-form {
  background-color: #f2f2f2;
  margin: auto;
  padding: 20px;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 400px;
  width:500px;
}
.contact-form .heading {
  font-size: 24px;
  color: black;
  margin-bottom: 12px;
  font-weight: bold;
  display: block;
}
.contact-form button[type="submit"] {
  background-color: #ff6384;
  color:1px solid black ;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
button {
    align-content:center;
 display: inline-block;
 border-radius: 4px;
 margin-top:40px;
 background-color: #3d405b;
 border: none;
 color: #FFFFFF;
 text-align: center;
 font-size: 17px;
 padding: 16px;
 width: 400px;
 transition: all 0.5s;
 cursor: pointer;
 margin: 5px;
}
</style>
</head>

<script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
<link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet" />
<script>
//  calender *****


		

//**********************
</script>


<body>
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <?php include '../includes/student-navigation.php'?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <?php include '../includes/student-sidebar.php'?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
        <?php

// Connect to the database
$conn = mysqli_connect($host,$dbuser, $dbpass, $db);

// Check connection
if (!$conn) { 
  die("Connection failed: " . mysqli_connect_error());
}


// Check connection


// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $Reg_id = $_POST["Reg_id"];
  $Feed_msg = $_POST["Feed_msg"];
  $Date = date('Y-m-d H:i:s');
  // Insert feed_msg into database
  $sql = "INSERT INTO tbl_feedback ( Reg_id, Feed_msg, Date) VALUES ('$Reg_id', '$Feed_msg', '$Date')";
  if ($mysqli->query( $sql) === TRUE) {
    echo "Feed_msg submitted successfully.<br><br>";
  } else {
    echo "Error: " . mysqli_error($conn) . "<br><br>";
  }
}

 echo '<a href="feedback_show.php">
 <button >Show feedbacks.</button><br>;
  </a><br>';


// Display feed_msg form
echo "<form class='contact-form' method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
echo "<h1>INSERT FEEDBACK</h1><br>";
echo "Reg_id: <input type='text' name='Reg_id'><br>";
echo "Feed_msg: <textarea name='Feed_msg'></textarea><br>";
echo "<input type='submit' value='Submit'>";

echo "</form>";

// Close connection
mysqli_close($conn);

?>
<?php include '../includes/footer.php' ?>
</div>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>
</html>
  

