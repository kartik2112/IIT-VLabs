<?php
    session_start();
    $_SESSION["currPage"] = 5;
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Virtual Labs </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
        <!-- Simulation scripts start-->
        <script src="../src/math.ob.js"></script>
        <script src="../src/numcheck.ob.js"></script>
        <script src="../src/canvasjschart.ob.js"></script>
        <script src="../src/bracket.ob.js"></script>

        <!-- jQuery 2.2.3 -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <link href="../src/StyleSheet1.css" rel="stylesheet" />


        <!--Here is the main script that handles the simulation-->
        <script type="text/javascript" src="exp1Simulation.js"></script>    
        <!--Here is the main CSS file that adds more touch to the simulation and other stuff-->    
        <link href="../Styles.css" rel="stylesheet" />


        <!--These are used for plotting the graphs-->
        <link rel = "stylesheet" type = "text/css" href = "http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css" />
 		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jsxgraph/0.99.5/jsxgraphcore.js"></script>

        <!-- Simulation scripts end-->
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
                            <li class="active">Simulation</li>
                        </ol>
                    </section>
                </nav>
            </header>
            <?php include 'pane.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1 align="center"><?php echo $exp_name?></h1>
                    <!-- Write your experiment name -->
                </section>
                <script type="text/javascript">
                    // Popup window code
                    function newPopup(url) {
                        popupWindow = window.open(url,'popUpWindow','height=500,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=yes')
                    }
                </script>
                <section class="content-header" style="float:right; margin-top:2%">
                    <a href="JavaScript:newPopup('procedure.php');" style="color:green;font-size: 16px"><img src="../../dist/img/popout.png" style="height:20px; width:20px; "> Pop Up Procedure</a>
                    <br>
                    <br>
                    <a href="" style="color:green; font-size: 16px"><img src="../../dist/img/fork.png" style="height:20px; width:20px; "></a>
                </section>
                <!-- Main content -->
                <section class="content">
                    <h3 style="margin-top:5%">Simulation</h3>
                    <!--Simulation content goes here -->
                    <div class="form-group" style="display: inline-block;">
                        <label for="selGate">Select gate:</label>
                        <select class="form-control" id="selGate" onchange="displayDiv(this.value)" style="width: 150px">
                            <option value="AND" selected>XOR Gate</option>
                        </select>
                    </div>
                    <button id="startSimButton" class="btn btn-success" onclick="startSimulation(1000)">Start Simulation</button>
                    <button id="stopSimButton" class="btn btn-danger disabled" onclick="stopSimulation()" disabled>Stop Simulation</button><br/>
                    <div>
                        <p id="ux-wrapper"> y(x) =  exp (- |x1-µ1|^2 )<br/>
                            &emsp;&emsp;= 0 , u(x) < Threshold</p>
                    </div>
                    <br/>
                    <div id="AND-gate-sim">
                            <h3>XOR Gate Neural Network (NN)</h3>
                            <b>w<sub>1</sub> : </b>
                            <div id="AND_Gate_w1_slider" class="sliders" style="width: 200px;display: inline-block;"></div>&emsp;<span class="AND-inputX-oplay_neuron1-weight"></span><br/>

                            <b>w<sub>2</sub> : </b>
                            <div id="AND_Gate_w2_slider" class="sliders" style="width: 200px;display: inline-block;"></div>&emsp;<span class="AND-inputY-oplay_neuron1-weight"></span><br/>

                            <b>Threshold : </b>
                            <div id="AND_Gate_Threshold_slider" class="sliders" style="width: 200px;display: inline-block;"></div>&emsp;<span class="AND-threshold-value"></span><br/>

                            <svg id="AND-gate-svg" width="700" height="400" style="float: left;margin-top: 70px">
                                <!--Neural Network connections-->
                                <line id="AND-inputX-oplay_neuron1" class="StdLine" x1="200" y1="50" x2="350" y2="150" style=""/>
                                <line id="AND-inputY-oplay_neuron1" class="StdLine" x1="200" y1="250" x2="350" y2="150" style=""/>
								<!-- @@@@@-->
                                <line id="AND-inputX-oplay_neuron2" class="StdLine" x1="50" y1="50" x2="200" y2="50" style=""/>
                                <line id="AND-inputY-oplay_neuron3" class="StdLine" x1="50" y1="250" x2="200" y2="250" style=""/>
                                <line id="AND-inputX-oplay_neuron3" class="StdLine" x1="50" y1="50" x2="200" y2="250" style=""/>
                                <line id="AND-inputY-oplay_neuron2" class="StdLine" x1="50" y1="250" x2="200" y2="50" style=""/>
								<!-- @@@@@-->
                                <line id="AND-oplay_neuron1-oplay_thrshld" class="StdLine" x1="350" y1="150" x2="550" y2="150" style=""/>

                                <!--Neural Network nodes-->
                                <circle id="AND-inputX" class="StdCircle" cx="50" cy="50" r="20"/>
                                <circle id="AND-inputY" class="StdCircle" cx="50" cy="250" r="20"/>
								<!-- @@@@@ -->
								
                                <circle id="AND-oplay_neuron2" class="StdCircle" cx="200" cy="50" r="20"/>
                                <circle id="AND-oplay_neuron3" class="StdCircle" cx="200" cy="250" r="20"/>
								<!-- @@@@@  -->
                                <circle id="AND-oplay_neuron1" class="StdCircle" cx="350" cy="150" r="20"/>
                                <image id="AND-oplay_thrshld" x="550" y="125"  height="50" width="50" xlink:href="../images/unipolar_threshold.png" style="padding: 10px;fill: #00b8ff"/>

                                <text font-size="20" x="350" y="155" font-size="25">∑</text>

                                <!--Input texts-->
                                <text font-size="20" x="15" y="55">X</text>
                                <text class="changingTextStyle AND-XVal" font-size="20" x="45" y="55"></text>
                                <text font-size="20" x="15" y="255">Y</text>
                                <text class="changingTextStyle AND-YVal" font-size="20" x="45" y="255"></text>
                                <text font-size="20" x="150" y="45">0</text>
                                <text font-size="20" x="150" y="100">0</text>
								<text font-size="20" x="150" y="220">1</text>
                                <text font-size="20" x="150" y="270">1</text>
								
								<text font-size="20" x="190" y="50">n1</text>
                                <text font-size="20" x="190" y="250">n2</text>

                                <!--Weights text-->
                                <text font-size="20" x="270" y="90">w<tspan baseline-shift="sub">1</tspan>=<tspan class="AND-inputX-oplay_neuron1-weight">1</tspan></text>
                                <text font-size="20" x="270" y="215">w<tspan baseline-shift="sub">2</tspan>=<tspan class="AND-inputY-oplay_neuron1-weight">1</tspan></text>
								
								<!-- n(x) related text -->
								 <text font-size="20" x="170" y="20"> y(x) =  exp (- |x1-µ1|^2 )</text>
								  <text font-size="20" x="170" y="285"> y(x) =  exp (- |x1-µ1|^2 ) </text>
								<text class="changingTextStyle" id="AND-n1x-value" font-size="20" x="230" y="40"></text>
								<text class="changingTextStyle" id="AND-n2x-value" font-size="20" x="200" y="310"></text>
                                <!--u(x) related texts-->
                                <text font-size="20" x="350" y="120">u(x) = w<tspan baseline-shift="sub">1</tspan>*X + w<tspan baseline-shift="sub">2</tspan>*Y</text>
                                <text font-size="20" x="350" y="180"> = <tspan class="AND-inputX-oplay_neuron1-weight">1</tspan>*(X=<tspan class="changingTextStyle AND-XVal"> </tspan>) + <tspan class="AND-inputY-oplay_neuron1-weight">1</tspan>*(Y=<tspan class="changingTextStyle AND-YVal"> </tspan>)</text>
                                <text class="changingTextStyle" id="AND-ux-value" font-size="20" x="360" y="200"></text>

                                <!--y(x) related texts-->
                                <text font-size="20" x="550" y="110">y(x)</text>
                                <text class="changingTextStyle" id="AND-yx-value" font-size="20" x="535" y="170"></text>
                                <text class="" font-size="20" x="455" y="220">Threshold: <tspan class="AND-threshold-value" ></tspan></text>

                                <text class="changingTextStyle" id="AND-yx-value-expln" font-size="20" x="415" y="70"></text>
                            </svg>
                            <div id="AND-output">
			                    <div id="AND-box" class="jxgbox" style="width:200px; height:200px;"></div>
		                    </div><br/>
                            <div style="font-family: 'Source Sans Pro', sans-serif;font-size: 20px;">                                
                                <button class="btn btn-warning disabled" id="ANDNextButton" disabled>Apply next set of I/P values</button><br/>
                                <h3>Truth Table of XOR Gate</h3>
                                <table class="table-condensed truthTable" style="">
                                    <tr><th>X</th><th>Y</th><th>Expected O/P</th><th>O/P from NN</th></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-1"><td>0</td><td>0</td><td>0</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-1"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-2"><td>0</td><td>1</td><td>1</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-2"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-3"><td>1</td><td>0</td><td>1</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-3"></td></tr>
                                    <tr class="AND-TT-rows" id="AND-TT-row-4"><td>1</td><td>1</td><td>0</td><td class="AND-TT-OP-rows" id="AND-TT-OP-row-4"></td></tr>
                                </table>
                            </div> 
                            <br/><br/><br/>                            
                            <p>
                                <b>Hint:</b> Try using -2.5 as threshold and -2.4 as weights
                            </p>                   
                    </div>
                    
                </section>                
                <!-- /.content -->
            </div>
            <?php include 'footer.html'; ?>
            <!-- /.content-wrapper -->
        </div>
    </body>
</html>



<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>