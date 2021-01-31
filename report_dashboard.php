<?php
    include ("SmartRecommendation.php");
    (isset($_REQUEST['c']) && !empty($_REQUEST['c'])) ? $cond = $_REQUEST['c'] : $cond = "";
    (isset($_REQUEST['p']) && !empty($_REQUEST['p'])) ? $prod = $_REQUEST['p'] : $prod = "";
    (isset($_REQUEST['pd']) && !empty($_REQUEST['pd'])) ? $period = $_REQUEST['pd'] : $period = "";

    if($period=="1")
        $period_val="Tomorrow";
    else if($period=="2")
        $period_val="Next 7 days";
    else
        $period_val="Next 30 days";

    $recommendation = new SmartRecommendation();
    $recommend = $recommendation->getRecommendation("1");
    $recommend_array = explode('#',$recommend);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
    <link href="demo.css" rel="stylesheet">
    <link href="dist/svgMap.css" rel="stylesheet">
    <script src="dist/svgMap.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/mystyle.css">

    <!-- Apex chart -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <title>Medi Chain!</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="card" id="main-card">
            <div class="card-body">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.jpg" alt="logo" width="140" height="140">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/img/profile.png" alt="profile_pic" id="profile_pic" class="rounded-circle" width="50" height="50">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- /.navbar -->
                <div  class="container-fluid">
                    <div class="row" id="hospital_top">
                        <div class="col-md-12">
                            <img src="assets/img/hospital_org.jpg" alt="hospital-logo" width="60" height="60" class="img-responsive"> <span id="hospital_txt">St. James Hospital</span>
                        </div>
                    </div>
                    <div class="row page_heading page_heading_sp" id="page_heading">
                        <div class="col-md-6">
                            Dashboard data outcomes
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="my_btn_edit" id="dashboard_edit">Edit&nbsp;<i class="fas fa-edit tab-space"></i></button>
                            <button type="button" class="my_btn">Refresh&nbsp;<i class="fa fa-refresh"></i></button>
                        </div>
                    </div>
                    <div class="row dataoutcome" id="">
                        <div class="col-md-4">
                            <p class="data_txt">Data predictions for</p>
                            <p id="per_val"><?php echo $period_val; ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="data_txt">Condition</p>
                            <p id="cond_val"><?php echo $cond; ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="data_txt"> Product</p>
                            <p id="prod_val"><?php echo $prod; ?></p>
                        </div>
                    </div>
                </div>
                <!-- ./top content -->
                <form action="" method="post">
                <div class="container-fluid">
                    <div class="card card_bg_color" id="predictive-analytic-bg-card">
                        <div class="card-body">
                            <div class="card" id="predictive-analytic-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav" id="nav_bg_round">
                                                <li class="nav-item">
                                                    <p class="page_subheading " style="padding-left:8px">Predictive analytics&nbsp;&nbsp;</p>
                                                </li>
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
                                    <div class="row " style="background-color:#e5ecf1; margin:20px;padding: 30px; border-radius:10px; color: #fff; font-size: 20px;">
                                        <div class="col-md-12">
                                            <div class="row text-center">
                                                <div class="col-md-4">
                                                    <label class="page_subheading">By country</label><br/>
                                                    <select class="select_drop" name="country_select" id="country_select" style="width: 70%">
                                                        <Option value="united_kingdom"> United Kingdom</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="page_subheading">By city</label><br/>
                                                    <select class="select_drop" name="city_select" id="city_select" style="width: 70%">
                                                        <Option value="london"> London</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="page_subheading">By borough</label><br/>
                                                    <select class="select_drop" name="borough_select" id="borough_select" style="width: 70%">
                                                        <Option value="bourough">Newham</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" id="spline_chart_country">
                                            
                                        </div>
                                        <div class="col-md-4" id="spline_chart_city">
                                            
                                        </div>
                                        <div class="col-md-4" id="spline_chart_borough">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form>
                <!-- ./Predictive analytic -->
                <div class="container-fluid">
                    <div class="card card_bg_color" id="product_info_card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="page_subheading   ">Product Information</p>
                                </div>
                                <div class="col-md-8 text-right alert_txt">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="row product_info_border">
                                <div class="col-md-12 mt-3">
                                    <div class="row page_subheading">
                                        <div class="col-md-4">
                                            Inventory state
                                        </div>
                                        <div class="col-md-8 text-right" >
                                            No previous data has been uploaded&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="my_btn" data-toggle="modal" data-target="#myModal">Upload &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-upload"></i></button>
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-5 mb-5">
                                        <div class="col-md-4">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-4 noupload_txt text-center">
                                            This widget will populate information when you upload your data
                                            
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img src="assets/img/upward_arrow_org.jpg" width="150" height="65">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img src="assets/img/pg2_org.jpg" width="536" height="405">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./product area -->
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="page_subheading page_subheading_sp">Smart recommendation</p>
                                </div>
                                <div class="col-md-8">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 text-left mt-5">
                                    <img src="assets/img/link_org.jpg" width="150" height="150">
                                </div>
                                <div class="col-md-10">
                                    <div class="card card_bg_color" id="product_info_card">
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-md-1 text-center">
                                                    <img src="assets/icons/navy/boxes.png" width="40" height="40" class="rounded-circle recommend_img">
                                                </div>
                                                <div class="col-md-11 recommend_txt">
                                                    <?php echo $recommend_array[0] ?>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-1 text-center">
                                                    <img src="assets/icons/navy/worldwide.png" width="40" height="40" class="rounded-circle recommend_img">
                                                </div>
                                                <div class="col-md-11 recommend_txt">
                                                    <?php echo $recommend_array[1] ?>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-1 text-center">
                                                    <img src="assets/icons/navy/doctors.png" width="40" height="40" class="rounded-circle recommend_img">
                                                </div>
                                                <div class="col-md-11 recommend_txt">
                                                    <?php echo $recommend_array[2] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./recommendation -->
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <img src="assets/img/info_icon.png" class="rounded-circle" width="70" height="70">
                                </div>
                                <div>
                                    <p class="mt-3" style="color: #608aab">Upload your inventory data to get more tailored insights</p>
                                </div>
                                <div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./product information -->
                <div class="container-fluid">
                    <div class="card" id="product_info_card">
                        <div class="card-body">
                            <div class="row page_subheading page_subheading_sp">
                                <div class="col-md-3">
                                    <p>Intelligent supply chain</p>
                                </div>
                                <div class="col-md-9 text-center">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div id="box">

                                        <div class="demo-wrapper">
                                      
                                          <!-- Demo GPD -->
                                      
                                          <div class="demo-container">
                                           
                                      
                                            <div id="svgMapGPD"></div>
                                            <script src="data/gdp.js"></script>
                                            <script>
                                              new svgMap({
                                                targetElementID: 'svgMapGPD',
                                                data: svgMapDataGPD
                                              });
                                            </script>
                                          </div>
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                                <!-- ./world map -->
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center page_subheading">Inventory data upload</h4>
                                <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="page_subheading">Download format</p>
                                        <p>Download the template to ensure the data collected will be structured correctly. </p>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="assets/img/excel.png" alt="excel">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="assets/img/excel.png" alt="excel">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="page_subheading">Upload data</p>
                                        <p>Upload your inventory data as an XLS or CSV file.</p>
                                        <button type="button" class="my_btn" data-dismiss="modal" onclick="callInventoryDashboard()">Upload file</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal -->

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/92496cd334.js" crossorigin="anonymous"></script>
    

    <script>
        $(document).ready(function(){
            $('.select_drop').select2()
            //$('#per_day').addClass('nav_rad')
            $("#nav_bg_round li").on('click', function(){
                $(this).siblings().removeClass('nav_rad');
                $(this).addClass('nav_rad')
            })
            
            // For spline chart for country
            generateCountryGraph()
            generateCityGraph()
            generateBoroughGraph()
            $('#country_select').change(generateCountryGraph)
            $('#city_select').change(generateCityGraph)
            $('#dashboard_edit').click(handleDashboardEdit)
        })
        const form = document.forms[0]
        let period_val = ''
        let counry_select = form.country_select.value

        const generateCountryGraph = () => {
            $('#spline_chart_country').html('')
            if(period_val=="")
                period_val = 1

            var d = new Date();
            var currDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();

            fetch('json_data.php')
                .then(response => response.json())
                .then(res => {
                    let spline_chart = []
                    let spline_chart_index = []
                    let cnt = 0;
                    let flag = 0;
                    let counter = 0;
                    for(i=0; i< res.data.length; i++)
                    {
                        var dt = new Date(res.index[i])
                        var temp =  dt.getFullYear() + "-" + (dt.getMonth()+1) + "-" + dt.getDate();
                        var first_val = ''
                        var last_val = ''

                        if(currDate==temp) 
                            flag = 1;

                        if(flag && cnt<30 && period_val=="1") {
                            spline_chart[cnt] = Math.round(res.data[i])
                            spline_chart_index[cnt] = temp.toString()

                            if(cnt<1)
                                first_val = spline_chart[cnt]
                            last_val = spline_chart[cnt]
                            cnt++;
                        }
                        else if(flag && period_val=="2") {
                            if(cnt<1)
                            {
                                console.log("first time for 2")
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()
                                first_val = spline_chart[counter]
                                counter++
                            }
                            else if((cnt%7)==0)
                            {
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()

                                last_val = spline_chart[counter]
                                counter++
                            }
                            cnt++
                        }
                        else if(flag && period_val=="3"){
                            if(cnt<1)
                            {
                                console.log("first time for 3")
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()
                                first_val = spline_chart[counter]
                                counter++
                            }
                            else if((cnt%30)==0)
                            {
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()

                                last_val = spline_chart[counter]
                                counter++;
                            }
                            cnt++;
                        }
                    }
                    
                    if((last_val-first_val)>0)
                        graph_color = '#f00';
                    else
                        graph_color = '#00f';
                    console.log('spline_chart:'+spline_chart.toString())
                    console.log('spline_chart_index:'+spline_chart_index.toString())
                    
                    //console.log('spline_chart_index:'+spline_chart_index.toString())
                    genGraph(spline_chart, spline_chart_index, graph_color, '#spline_chart_country')
                    
                })
        }
        const generateCityGraph = () => {
            $('#spline_chart_city').html('')
            console.log('empty the earlier graph-2')
            if(period_val=="")
                period_val = 1

            var d = new Date();
            var currDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();

            fetch('json_city_data.php')
                .then(response => response.json())
                .then(res => {
                    let spline_chart = []
                    let spline_chart_index = []
                    let cnt = 0;
                    let flag = 0;
                    let counter = 0;
                    for(i=0; i< res.data.length; i++)
                    {
                        var dt = new Date(res.index[i])
                        var temp =  dt.getFullYear() + "-" + (dt.getMonth()+1) + "-" + dt.getDate();
                        var first_val = ''
                        var last_val = ''

                        if(currDate==temp) 
                            flag = 1;

                        if(flag && cnt<30 && period_val=="1") {
                            spline_chart[cnt] = Math.round(res.data[i])
                            spline_chart_index[cnt] = temp.toString()

                            if(cnt<1)
                                first_val = spline_chart[cnt]
                            last_val = spline_chart[cnt]
                            cnt++;
                        }
                        else if(flag && period_val=="2") {
                            if(cnt<1)
                            {
                                console.log("first time for 2")
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()
                                first_val = spline_chart[counter]
                                counter++
                            }
                            else if((cnt%7)==0)
                            {
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()

                                last_val = spline_chart[counter]
                                counter++
                            }
                            cnt++
                        }
                        else if(flag && period_val=="3"){
                            if(cnt<1)
                            {
                                console.log("first time for 3")
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()
                                first_val = spline_chart[counter]
                                counter++
                            }
                            else if((cnt%30)==0)
                            {
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()

                                last_val = spline_chart[counter]
                                counter++;
                            }
                            cnt++;
                        }
                    }
                    
                    if((last_val-first_val)>0)
                        graph_color = '#f00';
                    else
                        graph_color = '#00f';
                    console.log('spline_chart:'+spline_chart.toString())
                    console.log('spline_chart_index:'+spline_chart_index.toString())
                    
                    //console.log('spline_chart_index:'+spline_chart_index.toString())
                    genGraph(spline_chart, spline_chart_index, graph_color, '#spline_chart_city')
                    
                })
        }
        const generateBoroughGraph = () => {
            $('#spline_chart_borough').html('')
            if(period_val=="")
                period_val = 1

            var d = new Date();
            var currDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();

            fetch('json_borough_data.php')
                .then(response => response.json())
                .then(res => {
                    let spline_chart = []
                    let spline_chart_index = []
                    let cnt = 0;
                    let flag = 0;
                    let counter = 0;
                    for(i=0; i< res.data.length; i++)
                    {
                        var dt = new Date(res.index[i])
                        var temp =  dt.getFullYear() + "-" + (dt.getMonth()+1) + "-" + dt.getDate();
                        var first_val = ''
                        var last_val = ''

                        if(currDate==temp) 
                            flag = 1;

                        if(flag && cnt<30 && period_val=="1") {
                            spline_chart[cnt] = Math.round(res.data[i])
                            spline_chart_index[cnt] = temp.toString()

                            if(cnt<1)
                                first_val = spline_chart[cnt]
                            last_val = spline_chart[cnt]
                            cnt++;
                        }
                        else if(flag && period_val=="2") {
                            if(cnt<1)
                            {
                                console.log("first time for 2")
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()
                                first_val = spline_chart[counter]
                                counter++
                            }
                            else if((cnt%7)==0)
                            {
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()

                                last_val = spline_chart[counter]
                                counter++
                            }
                            cnt++
                        }
                        else if(flag && period_val=="3"){
                            if(cnt<1)
                            {
                                console.log("first time for 3")
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()
                                first_val = spline_chart[counter]
                                counter++
                            }
                            else if((cnt%30)==0)
                            {
                                spline_chart[counter] = Math.round(res.data[i])
                                spline_chart_index[counter] = temp.toString()

                                last_val = spline_chart[counter]
                                counter++;
                            }
                            cnt++;
                        }
                    }
                    
                    if((last_val-first_val)>0)
                        graph_color = '#f00';
                    else
                        graph_color = '#00f';
                    console.log('spline_chart:'+spline_chart.toString())
                    console.log('spline_chart_index:'+spline_chart_index.toString())
                    
                    //console.log('spline_chart_index:'+spline_chart_index.toString())
                    genGraph(spline_chart, spline_chart_index, graph_color, '#spline_chart_borough')
                    
                })
        }
        const genGraph = (spline_chart, spline_chart_index, graph_color, div_chart) => {
            //console.log('gengraph index:'+spline_chart_index.toString())
            var options = {
                series: [{
                name: 'PPE',
                data: spline_chart
                }],
                chart: {
                height: 350,
                type: 'area'
                },
                dataLabels: {
                enabled: false
                },
                
                xaxis: {
                type: 'date',
                categories: spline_chart_index
                },
                tooltip: {
                x: {
                    format: 'dd/MM/yy'
                },
                },
                fill: {
                colors: [graph_color]
                },
                markers: {
                colors: ['#FF65E5']
                },
                dataLabels: {
                style: {
                    colors: ['#FF0065']
                }
                },
                stroke: {
                    show: true,
                    curve: 'smooth',
                    lineCap: 'round',
                    colors: ['#FF0065', '#E91E63', '#9C27B0'],
                    width: 2,
                    dashArray: 0,      
                }
                };

                var chart = new ApexCharts(document.querySelector(div_chart), options);
                chart.render();
        }
        function saveperiod(period){
            period_val = period
            generateCountryGraph()
            generateCityGraph()
            generateBoroughGraph()
            return null
        }
        const handleDashboardEdit = () => {
            window.location.href = "dashboard.html"
        }
        function callInventoryDashboard() {
            let url = 'inventory_dashboard.php?c=Covid-1&p=Tomorrow&pd=1';
            window.location = url;
        }
    </script>
  </body>
</html>