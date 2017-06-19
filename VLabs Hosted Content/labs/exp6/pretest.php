<?php
    session_start();
    $_SESSION["currPage"] = 3;
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Virtual Labs </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" class="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link href="../../src/Styles.css" rel="stylesheet" />
        
        <script>
            $(document).ready(function(){
                $(".optradio1").click(function(){
                    ////alert("clicked");
                    $("#optradio1Ans").slideDown();
                    $('html, body').animate({
                        scrollTop: $("#optradio1Ans").offset().top-300
                    }, 1000);
                });
                $(".optradio2").click(function(){
                    //alert("clicked");
                    $("#optradio2Ans").slideDown();
                    $('html, body').animate({
                        scrollTop: $("#optradio2Ans").offset().top-300
                    }, 1000);
                });
                $(".optradio3").click(function(){
                    //alert("clicked");
                    $("#optradio3Ans").slideDown();
                    $('html, body').animate({
                        scrollTop: $("#optradio3Ans").offset().top-300
                    }, 1000);
                });
                $(".optradio4").click(function(){
                    //alert("clicked");
                    $("#optradio4Ans").slideDown();
                    $('html, body').animate({
                        scrollTop: $("#optradio4Ans").offset().top-300
                    }, 1000);
                });
               
            });
        </script>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php
            include '../../common/header.html';
            include 'lab_name.php';
            $lab_name = $_SESSION['lab_name'];
            $exp_name = $_SESSION['exp_name'];      
                  ?>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="../explist.php" class="logo">
                    <p align="center" style="font-size:1em;">
                        <b>
                            <?php echo $lab_name?><!-- Write your lab name -->
                        </b>
                    </p>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    </a>
                    <section class="content-header">
                        <ol class="breadcrumb">
                            <li>
                                <a href="../explist.php">
                                    <i class="fa fa-dashboard"></i><?php echo $lab_name?><!-- Write your lab name -->
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <?php echo $exp_name?><!-- Write your experiment name -->
                                </a>
                            </li>
                            <li class="active">Pre Test</li>
                        </ol>
                    </section>
                </nav>
            </header>
            <?php include 'pane.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center">
                        <?php echo $exp_name?>
                        <!-- Write your experiment name -->
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <h3 style="margin-top:5%">Pre Test</h3>
                    <p class="MsoNormal" style="text-align:justify">
                        <!-- Pre Test content goes here -->
                        <h3>1. An associative network is </h3>

                        <input type="radio" class="optradio1" name="q1" value="1">A. A neural network that contains no loop<br>
                        <input type="radio" class="optradio1" name="q1" value="2">B.A neural network that contains feedback<br>
                        <input type="radio" class="optradio1" name="q1" value="3">C. A neural network that has only one loop<br>
                        <input type="radio" class="optradio1" name="q1" value="4">D. None<br>
                        <br />
                        <p id="optradio1Ans" class="testAns" style="display:none;"> Ans is B</p>
                        
                        <h3>2. A four input neuron has weights 1,2,3 and 4. The transfer function is linear with the constant of proportionality being equal to 2. The inputs are 4,10,5 and 20 respectively. The output will be
                           

                    </h3>
                    
                        <input type="radio" class="optradio2" name="q2" value="1"> A. 238<br>
                        <input type="radio" class="optradio2" name="q2" value="2"> B. 76<br>
                        <input type="radio" class="optradio2" name="q2" value="3"> C. 119 <br>
                        <input type="radio" class="optradio2" name="q2" value="4"> D.  None of the mentioned<br>

                        <br />
                        <p id="optradio2Ans" class="testAns" style="display:none;"> Ans is A</p>

                        <h3>3. Ability to learn how to do tasks based on the data given for training or initial experience</h3>
                    
                        <input type="radio" class="optradio3" name="q3" value="1"> A. Self organization<br>
                        <input type="radio" class="optradio3" name="q3" value="2"> B. Adaptive learning<br>
                        <input type="radio" class="optradio3" name="q3" value="3"> C. Fault tolerance<br>
                        <input type="radio" class="optradio3" name="q3" value="4"> D. Robustness<br>      

                        <br />
                        <p id="optradio3Ans" class="testAns" style="display:none;"> Ans is B</p>
                            
                        <h3>4. A neural network can answer</h3>

                        <input type="radio" class="optradio4" name="q4" value="1"> A. For loop questions<br>
                    <br>
                    <input type="radio" class="optradio4" name="q4" value="2"> B.   what-if questions<br><br>
                        <input type="radio" class="optradio4" name="q4" value="3"> C.  IF-then else questions<br><br>
                        <input type="radio" class="optradio4" name="q4" value="4"> D. None of these<br><br>

                        <br />
                        <p id="optradio4Ans" class="testAns" style="display:none;"> Ans is B</p>
                    
                        
                    </p>
                </section>
                <!-- /.content -->
            </div>
            <?php include 'footer.html'; ?>
            <!-- /.content-wrapper -->
        </div>
    </body>
</html>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>

