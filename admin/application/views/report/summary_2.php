<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Input Size -->
                    <h3 class="title-5 m-b-35">Report Detail</h3>
                    <div class="card">
                        <div class="card-header">                                       
                            <strong>Customer Detail</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php if (!empty($detail_report)) : ?>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Customer Name</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <label for="input-normal" class=" form-control-label">: <?= $detail_report[0]['student_name'] ?></label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Order Date</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <label for="input-normal" class=" form-control-label">: <?= $detail_report[0]['date_only'] ?></label>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Customer Name</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <label for="input-normal" class=" form-control-label">: Not Found</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-5">
                                        <label for="input-normal" class=" form-control-label">Order Date</label>
                                    </div>
                                    <div class="col col-sm-6">
                                        <label for="input-normal" class=" form-control-label">: Not Found</label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">                                       
                            <strong>Report Summary</strong>
                        </div>
                        <div class="card-body card-block">
                            <?php 
                                $counter = 1;
                                foreach ($po_dates as $v) {
                                    echo '<div class="row form-group">';
                                    echo '<div class="col col-sm-8">';
                                    echo '<label for="input-normal" class="form-control-label font-weight-bold">' . $v . '</label><br/>';
                                    

                                    foreach ($detail_report as $detail) {
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

                                            if ($is_holiday == true) {
                                                // echo '<div class="col col-sm-5">';
                                                echo '<label for="input-normal" class="form-control-label">' . $holiday_description . '</label><br/>';
                                                // echo '</div>';
                                            } else {
                                                $menu_found = false;
                                                $total_price = '';
                                                // echo '<div class="col col-sm-6">';
                                                $price_in_k = $detail['price'] / 1000 . 'k'; 
                                                echo '<label for="input-normal" class="form-control-label">' . $detail['category'] . '<br/>- ' . $detail['menu'] . ' - ' . $price_in_k . '</label><br/>';
                                                // echo '</div>';
                                                $menu_found = true;  
                                            }
                                        }
                                    }
                                    echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>