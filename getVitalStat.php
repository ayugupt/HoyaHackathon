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

    echo $output;
?>