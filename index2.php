<?php
    require_once 'dbconnect.php';
    // Create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error)
        die("Err-9020:There is some technical erro. Please try sometime later. " . $conn->connect_error);

    $sql = "select * from patient_details where status=1";
    $result = $conn->query($sql) or die("Err#DB-102::There is some technical error in executing queries. Please try sometime later." . mysqli_error($conn));

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
    
    <title>Medi Chain!</title>
  </head>
  <body>
  
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
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
                        Reports
                    </div>
                    <div class="col-md-3">
                        &nbsp;
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6 offset-md-1" >
                        <div class="d-flex flex-row text-center" id="report_list">
                            <div class="p-2 opt_row text-center" style="width:120px; background-color:#e5ecf1"><br/>&nbsp;<br/></div>
                            <div class="p-2 opt_row text-center"><img src="assets/img/patient.png" width="30" height="30"><br/>Total Patients<br/><strong>76</strong></div>
                            <div class="p-2 opt_row text-center"><img src="assets/img/telephone.png" width="30" height="30"><br/>Phone Calls<br/><strong>52</strong></div>
                            <div class="p-2 opt_row text-center"><img src="assets/img/appointment.png" width="30" height="30"><br/>Appointments<br/><strong>72</strong></div>
                            <div class="p-2 opt_row text-center"><img src="assets/img/email.png" width="30" height="30"><br/>unread Mails<br/><strong>45</strong></div>
                            <div class="p-2 opt_row text-center"><img src="assets/img/clock-circular-outline.png" width="30" height="30"><br/>Time Worked<br/><strong>26</strong></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 flex_txt1">
                        My Appointments
                    </div>
                    <div class="col-md-3">
                        <ul class="nav" id="nav_bg_round">
                            <li class="nav-item">
                                <a class="nav-link text-top" id="per_day" href='javascript:void(0)' onclick='saveperiod("1")'>Per day</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='javascript:void(0)' onclick='saveperiod("2")'>Per week</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='javascript:void(0)' onclick='saveperiod("3")'>Per month</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card col-md-10 offset-md-1" id="appointment_card">
                    <div class="card-body">
                        <div class="row appointment_paitent_info" style="background-color:#fff">
                            <div class="col-md-2">Patient Name</div>
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-2">Location</div>
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-2">Date</div>
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-2">Time</div>
                        </div>
                        <div class="row appointment_paitent_info" style="margin-top:15px; background-color:#fff">
                            <div class="col-md-2"><img src="assets/img/logo.jpg" alt="logo" width="20" height="20"> Arnav mahajan</div>
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-2">Delhi</div>
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-2">20 Jan, 2021</div>
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-2">10:30 AM</div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
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
                url:'getIndexAppointmentData.php',
                data:{
                    period:period
                },
                success:function(html){
                    console.log(html)
                    $('#appointment_result').html(html);
                }
            }); 
        }
    </script>
  </body>
  </html>