<?php 
    require_once 'dbconnect.php';
    // Create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error)
        die("Err-9020:There is some technical erro. Please try sometime later. " . $conn->connect_error);
    
    (isset($_REQUEST['period']) && !empty($_REQUEST['period'])) ? $period = $_REQUEST['period'] : $period = "";

    $sql = "";
    if($period=="1")
        $sql = "select * from patient_details where status=1 and next_visit>=date(now()) and next_visit< DATE_ADD(date(now()), INTERVAL 1 DAY);";
    else if($period=="2")
        $sql = "select * from patient_details where status=1 and next_visit>=date(now()) and next_visit< DATE_ADD(date(now()), INTERVAL 7 DAY);";
    else if($period=="3")
        $sql = "select * from patient_details where status=1 and next_visit>=date(now()) and next_visit< DATE_ADD(date(now()), INTERVAL 30 DAY);";        

    $result = $conn->query($sql) or die("Err#DB-102::There is some technical error in executing queries. Please try sometime later." . mysqli_error($conn));

    $cnt = 0;
    $output = '';
    if($result->num_rows<1) {
        $output = '   <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="card " style="margin:20px;" id="patient_card">
                    <!-- Card Body -->
                    <div class="card-body" id="patient_info" >
                        <!-- Card Title -->

                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-4 col-lg-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="assets/img/boy.png" alt="" id="paitent_photo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-7">
                                No appointment for today                                                
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>';
    }
    else {
        while($row = mysqli_fetch_array($result)) { 
            if($cnt==0) 
                $output = '<div class="row">';
            $output .= '<div class="col-md-4 col-sm-12">
            <div class="card " style="margin:20px;" id="patient_card">
                <!-- Card Body -->
                <div class="card-body" id="patient_info" >
                    <!-- Card Title -->

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-4 col-lg-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="assets/img/boy.png" alt="" id="paitent_photo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p id="paitent_name" >' . $row['patient_name'] . '</p>
                                    <p id="paitent_age">' . $row['age'] . '</p>
                                    <p id="paitent_illness">' . $row['disease'] . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-7">
                            <div class="row">
                                <div class="card" id="last_visit">
                                    <div class="card-body" id="last_visit_body">Last Visit : 
                                    ' . date("d-m-Y", strtotime($row['last_visit'])) . '</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card" id="last_visit">
                                    <div class="card-body" id="last_visit_body">Next Visit :
                                        ' . date("d-m-Y", strtotime($row['next_visit'])) . '</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card" id="last_visit">
                                    <div class="card-body" id="last_visit_body">Condition : ' .  $row['condition'] . '</div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <i class="far fa-edit fa-2x"></i>
                                </div>

                                <div class="col-md-9">
                                    <div class="card" id="notes_btn_main">
                                        <div class="card-body" id="notes_btn_body">
                                            <form action="page_3.php" method="post">
                                                <input type="hidden" name="patient_id" value="' . $row["id"] .'" />
                                                <input type="submit" value="Notes">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>';
        if($cnt == 3) {
            $output .= '</div>';
            $cnt = 0;
        }
        $cnt++;
        }
        if($cnt<3)
            $output .= '</div';
    }

    echo $output;
?>