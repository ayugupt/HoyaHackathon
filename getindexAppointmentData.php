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

    $output = '<div class="row appointment_paitent_info" style="margin-top:15px; background-color:#fff">
    <div class="col-md-3"><strong>Patient Name</strong></div>
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-2"><strong>Location</strong></div>
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-2"><strong>Date</strong></div>
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-2"><strong>Time</strong></div>
</div>';
    if($result->num_rows<1) {
        $output = '<div class="row appointment_paitent_info" style="margin-top:15px; background-color:#fff">
        <div class="col-md-2">No Appointments</div>
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-2">&nbsp;</div>
    </div>';
    }
    else {
        while($row = mysqli_fetch_array($result)) { 
            $output .= '<div class="row appointment_paitent_info" style="margin-top:15px; background-color:#fff">
            <div class="col-md-3"><img src="assets/img/boy.png" alt="logo" width="20" height="20">' . $row["patient_name"] . '</div>
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-2">' . $row["location"] . '</div>
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-2">' . date("d-m-Y", strtotime($row["next_visit"])) . '</div>
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-2">' . date("H:i A", strtotime($row["next_visit"])) . '</div>
        </div>';
        }
    }

    echo $output;
?>