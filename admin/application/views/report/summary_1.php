<style>
    /* Popup container - can be anything you want */
    .popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    /* The actual popup */
    .popup .popuptext {
    visibility: hidden;
    width: 70px;
    background-color: #666 ;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -35px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #666  transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
    }

    @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Input Size -->
                    <h3 class="title-5 m-b-35">Report Detail</h3>
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <span class="font-weight-bold">Report Summary</span>
                            <!-- <button type="" class="btn btn-info ml-auto btn-copy popup">Copy</button> -->
                            <div class="btn btn-dark ml-auto btn-copy popup" onclick="myFunction()">
                                Copy
                                <span class="popuptext" id="myPopup">Copied</span>
                            </div>
                        </div>
                        <div class="card-body card-block body-text">
                            <label class="form-control-label">Dear SWA Parents</label></br></br>
                            <?php if (!empty($detail_report)) : ?>
                                <label class="form-control-label"> 
                                    Thank you for ordering and submitting the Pre  Order Meal for <?= $detail_report[0]['student_name'] 
                                    ?> (Student Name)</label><br/></br>
                                <label class="form-control-label">Please kindly confirm and recheck the revise Pre Order Meal details:</label><br/>
                                <label class="form-control-label text-uppercase"> <?= $detail_report[0]['student_name'] ?> - <?= $detail_report[0]['grade'] ?></label><br/>
                            <?php endif; ?>
                            <form>
                                <?php 
                                    $counter = 1;
                                    $total_price = 0;
                                    $prev_date = null;
                                    $week = 1;
                                    $no = 1;
                                    foreach ($dates as $item) {
                                        $begin_date = new DateTime($item['begin_date']);
                                        $day_of_week = $begin_date->format('N');
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+12 day');

                                        $period = new DatePeriod($begin_date, new DateInterval('P1D'), $end_date);
                                        $date_range = [];
                                        $exclude_days = [5, 6];
                                        foreach ($period as $date) {
                                            // $date_range[] = $date->format('Y-m-d');
                                            $day_from_begin = $begin_date->diff($date)->days;
                                            if (!in_array($day_from_begin, $exclude_days)) {
                                                $date_range[] = $date->format('Y-m-d');
                                            }
                                        }
                                        // print_r($date_range); exit;

                                        foreach ($po_dates as $v) {
                                            // Check if the date is in date_range
                                            if (in_array($v, $date_range)) {
                                                // The date is in date_range
                                                foreach ($detail_report as $detail) {
                                                    echo '<div class="form-group">';
                                                    if ($detail['po_date'] == $v) {
                                                        $is_holiday = false;
                                                        $holiday_description = '';
                                                        
                                                        foreach ($holidays as $holiday) {
                                                            $holiday_date = new DateTime($holiday['date']);
                                                            
                                                            if ($holiday_date == $detail['po_date']) {
                                                                $is_holiday = true;
                                                                $holiday_description = $holiday['description'];
                                                                break;
                                                            }
                                                        }
                                                        // echo '<label class="form-control-label">'; 
                                                        if ($is_holiday == true) {
                                                            echo $holiday_description . '</br>';
                                                        } else {
                                                            $date = DateTime::createFromFormat('Y-m-d', $v);
                                                            $formatted_date = $date->format('d M');
                                                            $menu_found = false;
                                                            $total_price += $detail['price'];
                                                            echo $no . '. ' . $detail['menu'] . ' - ' . $formatted_date . ' - IDR ' . $detail['price'] . '';
                                                            $menu_found = true;  
                                                            $no++;
                                                        }
                                                        // echo '</label>';
                                                    }
                                                    echo '</div>';
                                                    // echo '</br>';
                                                }
                                                // The date is in date_range, remove it
                                                $key = array_search($v, $date_range);
                                                unset($date_range[$key]);

                                            } 
                                            // xelse if (!in_array($v, $date_range)) {
                                                // print_r($date_range); exit;
                                                // The date is not in date_range, print the date_range array as a string
                                                // $date_range = [];  // Clear the date_range array                                            }
                                            // }
                                        }
                                        foreach($date_range as $date) {
                                            $formatted_dates[] = date('d M', strtotime($date));
                                        }
                                        echo "No order in dates: " . implode(", ", $formatted_dates) . "<br>";
                                        // print_r($date_range); exit;
                                        // Convert $po_dates[0] to 'd M' format
                                        $date_start = DateTime::createFromFormat('Y-m-d', $po_dates[0]);
                                        $formatted_date_start = $date_start->format('d M');

                                        // Convert end($po_dates) to 'd M' format
                                        $date_end = DateTime::createFromFormat('Y-m-d', end($po_dates));
                                        $formatted_date_end = $date_end->format('d M Y');
                                        // echo '<div class="form-group">';
                                        echo '<label class="form-control-label my-2">Sub Total : IDR ' . $total_price . '<label></br>';
                                        echo "</br>The total amount need to be transferred to our School Account 0000554103 (Bank Sinarmas) or 4970350018 (BCA) is IDR " . $total_price . "<br/>";
                                        echo 'Please kindly send the payment proof of the pre order meal to <a href="mailto:finance@swa-jkt.com">finance@swa-jkt.com</a> or <a href="mailto:ervi_liu@swa-jkt.com">ervi_liu@swa-jkt.com</a> , so we can proceed to prepare your requested meal starting ' . $formatted_date_start . ' - ' . $formatted_date_end . ' and deliver to ' . $detail_report[0]['student_name'] . '\'s Class.';
                                        // echo '</div>';
                                    }
                                ?>
                                
                            </form>

                            <!-- No empty text -->
                            <!-- <div class="row form-group">
                                <?php 
                                    $counter = 1;
                                    $total_price = 0;
                                    $prev_date = null;
                                    foreach ($po_dates as $v) {
                                        // Convert $v to 'dd Month' format
                                        $date = DateTime::createFromFormat('Y-m-d', $v);
                                        $formatted_date = $date->format('d F');

                                        foreach ($detail_report as $detail) {
                                            echo '<div class="col col-sm-8">';
                                            if ($detail['po_date'] == $v) {
                                                $is_holiday = false;
                                                $holiday_description = '';
                                                
                                                foreach ($holidays as $holiday) {
                                                    $holiday_date = new DateTime($holiday['date']);
                                                    
                                                    if ($holiday_date == $detail['po_date']) {
                                                        $is_holiday = true;
                                                        $holiday_description = $holiday['description'];
                                                        break;
                                                    }
                                                }
                                                echo '<label class="form-control-label">'; 
                                                if ($is_holiday == true) {
                                                    echo $holiday_description . '</br>';
                                                } else {
                                                    $menu_found = false;
                                                    $total_price += $detail['price'];
                                                    echo $detail['menu'] . ' - ' . $formatted_date . ' - IDR ' . $detail['price'] . '</br>';
                                                    $menu_found = true;  
                                                }
                                                echo '</label>';
                                            }
                                            echo '</div>';
                                        }
                                    }
                                    echo '<div class="col col-sm-10">';
                                    echo '<label class="form-control-label mb-2">Sub Total : IDR ' . $total_price . '<label><br/>';
                                    echo "The total amount need to be transferred to our School Account 0000554103 (Bank Sinarmas) or 4970350018 (BCA) is IDR " . $total_price . "<br/>";
                                    echo 'Please kindly send the payment proof of the pre order meal to <a href="mailto:finance@swa-jkt.com">finance@swa-jkt.com</a> or <a href="mailto:ervi_liu@swa-jkt.com">ervi_liu@swa-jkt.com</a> , so we can proceed to prepare your requested meal starting ' . $po_dates[0] . ' - ' . end($po_dates) . ' and deliver to ' . $detail_report[0]['student_name'] . '\'s Class.';
                                    echo '</div>';
                                ?>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>