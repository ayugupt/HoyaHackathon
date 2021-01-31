<?php 
    require_once 'dbconnect.php';
    // Create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error)
        die("Err-9020:There is some technical erro. Please try sometime later. " . $conn->connect_error);
    
    (isset($_REQUEST['patient_id']) && !empty($_REQUEST['patient_id'])) ? $patient_id = $_REQUEST['patient_id'] : $patient_id = "";

    $sql = "select a.vital_stat_name, a.vital_stat_value, a.vital_stat_range, b.patient_name from patient_vital_stat a, patient_details b where a.status=1 and a.patient_id=" . $patient_id . " and a.patient_id=b.id";        

    $result = $conn->query($sql) or die("Err#DB-102::There is some technical error in executing queries. Please try sometime later." . mysqli_error($conn));

    $cnt = 0;
    $output = '';
    if($result->num_rows<1) {
        $output = '<div class="col-md-6">
        <div class="card" id="analysis_code">
            <div class="row">
                <div class="col" id="analysis_code_info">
                    No details available
                </div>
            </div>
        </div>
    </div>';
    }
    else {
        while($row = mysqli_fetch_array($result)) { 
            if($cnt==0) 
                $output = '<div class="row">';
            $output .= '<div class="col-md-6">
            <div class="card" id="analysis_code">
                <div class="row">
                    <div class="col" id="analysis_code_info">' . $row["vital_stat_name"] . '</div>
                    <div class="col" id="analysis_code_info">' . $row["vital_stat_value"] . '</div>
                    <div class="col" id="analysis_code_info">' . $row["vital_stat_range"] . '</div>
                </div>
            </div>
        </div>';
        if($cnt == 2) {
            $output .= '</div>';
            $cnt = 0;
        }
        $cnt++;
        }
        if($cnt<2)
            $output .= '</div>';
    }

  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/chatbot.css">
    
    <title>Medi Chain!</title>
  </head>
  <body>
    <div id="mySidebar" class="sidebar">
        <a class="closebtn" onclick="closeNav()">×</a>
        <h2 style="text-align: center; color: #f1f1f1;">Chatbot</h2>
        <div class="chatLog" style="flex:0.95;">
             <ul id="chatList">
             </ul>
        </div>
        <div class="inputChat">
            <form id="chatForm" method="GET"> 
              <input type="submit" id="sendToChatbot" style="float: left" value="Send"/>
              <input type="text" id="mssgToChatbot" style="float: right; width: 170px;" name="message"/>
            </form>
        </div>
      </div>
    <div id="main">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div col="col-md-4">
                        <ul class="nav nav-fill" id="main_navbar">
                            <li class="main_navbar_item" id="main_navbar_item">
                                <a href="#" style="text-decoration: none; color:white;" onclick="goBack()">Back</a> 
                            </li>
                            <li class="main_navbar_item" id="main_navbar_item">
                                <a href="index.php" style="text-decoration: none; color:white;">Home</a>                                     
                            </li>
                            <li class="main_navbar_item" id="main_navbar_item">
                            <a href="dashboard.html" style="text-decoration: none; color:white;">Supply Chain</a>
                            </li>
                            <li class="main_navbar_item" id="main_navbar_item">
                               <a href="#" style="text-decoration: none; color:white;" onclick="openNav()">Chatbot</a> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="assets/img/logo.jpg" alt="logo" width="140" height="140">
                    </div>
                    <div class="col-md-10">
                        <div class="flex-container">
                            <div class="flex_txt">Good Morning, Dr. Smith<br/><h6>Have a nice day at work</h6></div>
                            <div class="flex_space" >&nbsp;</div>
                            <div class="flex_img"><img src="assets/img/doctor_logo1.png" alt="logo"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 flex_txt1">
                        &nbsp;
                    </div>
                    <div class="col-md-9">
                        <ul class="nav" id="nav_bg_round">
                            <li class="nav-item">
                                <a class="nav-link text-top">&nbsp;</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-top" id="per_day" href='javascript:void(0)' onclick='saveperiod("1")'><strong>Basic Info</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='javascript:void(0)' onclick='saveperiod("2")'><strong>Reports</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='javascript:void(0)' onclick='saveperiod("3")'><strong>Medical History</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-top" id="per_day" href='javascript:void(0)' onclick='saveperiod("1")'><strong>Meeting-1</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='javascript:void(0)' onclick='saveperiod("2")'><strong>Meeting-2</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='javascript:void(0)' onclick='saveperiod("3")'><strong>Diagonostics</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='javascript:void(0)' onclick='saveperiod("3")'><strong>Billing</strong></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row" id="opt_value">
                    <div class="col-md-7">
                        <div class="card" id="paitent_body">
                            <img src="assets/img/Med-Chain-Dr. Chrono-WOrking/body.png" class="card-img-top" alt="..." height="1000px" >
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" id="heart-scan">
                                    <img src="assets/img/Med-Chain-Dr. Chrono-WOrking/bradycardia.png" class="card-img-top" alt="..." height="80%" width="50%">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" id="heart-scan">
                                    <img src="assets/img/Med-Chain-Dr. Chrono-WOrking/kidney.png" class="card-img-top" alt="..." height="80%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="predictive-analysis-heading">
                    <div class="col-md-12">
                        Predictive Analysis
                    </div>
                </div>
                <div class="row" id="vital_stat">
                    <?= $output; ?>
                </div>
                <!-- ./row end -->
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="data/httpRequest.js"></script>
    <script>
        function openNav() {
  
            document.getElementById("mySidebar").style.width = "250px";
            }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            }
        const form = document.forms[0]
        $(document).ready(function(){
            getAppointmentData(1)
        })
        function saveperiod(period){
            period_val = period
            //alert(period_val)
            getAppointmentData(period_val)
            return null
        }
        const getAppointmentData = period => {
            $.ajax({
                type:'POST',
                url:'getAppointmentData.php',
                data:{
                    period:period
                },
                success:function(html){
                    console.log(html)
                    $('#appointment_result').html(html);
                }
            }); 
        }

        function goBack() {
            window.history.back();
        }
    </script>
  </body>
  </html>