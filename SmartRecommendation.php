<?php
    class SmartRecommendation {
    
        function __construct( ) {
        }

        function getRecommendation($cond) {
            $d = date("Y-m-d");

            if($d=="2020-09-30" && $cond="1") {
                $msg = "Based on the predicted cases for tomorrow, we recommend having 79 PPE units before or on Oct 1st, 2020#Shipping from United Kingdom is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 3 ER doctors and 6 nurses on the field during the week of Oct 1st, 2020";
            }
            else if($d=="2020-09-30" && $cond="2") {
                $msg = "Based on the predicted cases for the next 7 days, we recommend having 33 PPE units before or on Oct 7th, 2020#Shipping from Germany is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 1 ER doctors and 3 nurses on the field during the week of Oct 7th, 2020";
            }
            else if($d=="2020-09-30" && $cond="3") {
                $msg = "Based on the predicted cases for the next 30 days, we recommend having 25 PPE units before or on Oct 30th, 2020#Shipping from India is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 1 ER doctors and 2 nurses on the field during the week of Oct 30th, 2020";
            }
            else if($d=="2020-10-01" && $cond="1") {
                $msg = "Based on the predicted cases for tomorrow, we recommend having 78 PPE units before or on Oct 2nd, 2020#Shipping from United Kingdom is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 3 ER doctors and 5 nurses on the field during the week of Oct 2nd, 2020";
            }
            else if($d=="2020-10-01" && $cond="2") {
                $msg = "Based on the predicted cases for the next 7 days, we recommend having 42 PPE units before or on Oct 8th, 2020#Shipping from Germany is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 2 ER doctors and 3 nurses on the field during the week of Oct 8th, 2020";
            }
            else if($d=="2020-10-01" && $cond="3") {
                $msg = "Based on the predicted cases for the next 30 days, we recommend having 31 PPE units before or on Oct 31st, 2020#Shipping from India is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 1 ER doctors and 3 nurses on the field during the week of Oct 31st, 2020";
            }
            else if($d=="2020-10-02" && $cond="1") {
                $msg = "Based on the predicted cases for tomorrow, we recommend having 71 PPE units before or on Oct 3rd, 2020#Shipping from United Kingdom is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 3 ER doctors and 5 nurses on the field during the week of Oct 3rd, 2020";
            }
            else if($d=="2020-10-02" && $cond="2") {
                $msg = "Based on the predicted cases for the next 7 days, we recommend having 50 PPE units before or on Oct 9th, 2020#Shipping from Germany is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 2 ER doctors and 4 nurses on the field during the week of Oct 9th, 2020";
            }
            else if($d=="2020-10-02" && $cond="3") {
                $msg = "Based on the predicted cases for the next 30 days, we recommend having 21 PPE units before or on Nov 1st, 2020#Shipping from India is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 1 ER doctors and 2 nurses on the field during the week of Nov 3rd, 2020";
            }
            else if($d=="2020-10-03" && $cond="1") {
                $msg = "Based on the predicted cases for tomorrow, we recommend having 82 PPE units before or on Oct 4th, 2020#Shipping from United Kingdom is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 3 ER doctors and 8 nurses on the field during the week of Oct 4th, 2020";
            }
            else if($d=="2020-10-03" && $cond="2") {
                $msg = "Based on the predicted cases for the next 7 days, we recommend having 600K PPE units before or on Oct 10th, 2020#Shipping from Germany is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 3 ER doctors and 7 nurses on the field during the week of Oct 10th, 2020";
            }
            else if($d=="2020-10-03" && $cond="3") {
                $msg = "Based on the predicted cases for the next 30 days, we recommend having 24 PPE units before or on Nov 2nd, 2020#Shipping from India is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 1 ER doctors and 2 nurses on the field during the week of Nov 2nd, 2020";
            }
            if($d=="2020-10-04" && $cond="1") {
                $msg = "Based on the predicted cases for tomorrow, we recommend having 47 PPE units before or on Oct 5th, 2020#Shipping from United Kingdom is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 2 ER doctors and 4 nurses on the field during the week of Oct 5th, 2020";
            }
            else if($d=="2020-10-04" && $cond="2") {
                $msg = "Based on the predicted cases for the next 7 days, we recommend having 32 PPE units before or on Oct 11th, 2020#Shipping from Germany is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 2 ER doctors and 3 nurses on the field during the week of Oct 11th, 2020";
            }
            else if($d=="2020-10-04" && $cond="3") {
                $msg = "Based on the predicted cases for the next 30 days, we recommend having 31 PPE units before or on Nov 3rd, 2020#Shipping from India is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 1 ER doctors and 2 nurses on the field during the week of Nov 3rd, 2020";
            }
            else {
                $msg = "Based on the predicted cases for the next 30 days, we recommend having 600K PPE units before or on Nov 3rd, 2020#Shipping from China is the cheapest option and the shipping time should meet the deadline (low risk)#It is advised to have 30 ER doctors and 80 nurses on the field during the week of Nov 3rd, 2020";
            }

            return $msg;
        }

    }
?>