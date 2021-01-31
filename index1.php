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
                <div class="row">
                    <div class="col-md-4">
                        <div class="card " style="margin:20px;">
                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Card Title -->

                                <?php 
                                    $cnt = 0;
                                    while($row = mysqli_fetch_array($result)) { 
                                        if($cnt == 0) 
                                            echo '<div class="row">';
                                ?>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="assets/img/boy.png" alt="" id="paitent_photo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p id="paitent_name">Arnav Mahajan</p>
                                                <p id="paitent_age">19</p>
                                                <p id="paitent_illness">Cough</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="card" id="last_visit">
                                                <div class="card-body" id="last_visit_body">Last Visit : 7 Jan 2020</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="card" id="last_visit">
                                                <div class="card-body" id="last_visit_body">Next Visit : 7 Jan 2020</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="card" id="last_visit">
                                                <div class="card-body" id="last_visit_body">Condition : Normal</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="far fa-edit fa-2x"></i>
                                            </div>

                                            <div class="col-md-9">
                                                <div class="card" id="notes_btn_main">
                                                    <div class="card-body" id="notes_btn_body">
                                                        Notes
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                        $cnt++;
                                        if ($cnt == 3) {
                                            echo '</div>';
                                            $cnt = 0;
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.select_drop').select2()

            $("#nav_bg_round li").on('click', function(){
                $(this).siblings().removeClass('nav_rad');
                $(this).addClass('nav_rad')
            })
        })
    </script>
  </body>
</html>