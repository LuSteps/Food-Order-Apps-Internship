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
                </div>
            </div>
            <!-- Table -->
            <div class="row form-group">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-responsive">
                        <table class="table table-data2">
                            <!-- Week 1 -->
                            <thead>
                                <tr>
                                <th rowspan="2" class="align-middle col-1">Week 1</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thrusday</th>
                                <th>Friday</th>
                                </tr>
                                <tr>
                                    <?php foreach ($dates as $item) : ?>
                                        <?php
                                            $date = new DateTime($item['begin_date']);
                                            $day_of_week = $date->format('N');
                                            $days_added = 0;

                                            // If the date is not a Monday, adjust the date to the previous Monday
                                            if ($day_of_week != 1) {
                                                $days_to_subtract = $day_of_week - 1;
                                                $date->modify("-$days_to_subtract day");
                                            }

                                            for ($i = 0; $days_added < 5; $i++) :
                                                echo '<th>' . $date->format('j M Y') . '</th>';
                                                $date->modify('+1 day');
                                                $days_added++;
                                            endfor;
                                    endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr">
                                    <td class="align-middle">Daily Set</td>
                                    <?php 
                                    $counter = 1;
                                    foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $day_of_week = $begin_date->format('N');
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 1; $i <= 5; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify('-' . ($day_of_week - $i) . ' day');
                                            $is_holiday = false;
                                            $holiday_description = '';

                                            foreach ($holidays as $holiday) {
                                                $holiday_date = new DateTime($holiday['date']);

                                                if ($holiday_date == $date_to_check) {
                                                    $is_holiday = true;
                                                    $holiday_description = $holiday['description'];
                                                    break;
                                                }
                                            }

                                            if ($is_holiday == true) {
                                                echo '<td class="col-2">' . $holiday_description . '</td>';
                                            } else {
                                                $menu_found = false;
                                                $total_price = '';

                                                if ($i >= $day_of_week) {
                                                    foreach ($menu_daily_set as $menu) {
                                                        // print_r($menu); exit;
                                                        $menu_date = new DateTime($menu['date']);
                                                        if ($menu_date == $date_to_check) {
                                                            $background = '';
                                                            foreach ($detail_report as $report) {
                                                                if ($report['id_po_purchase_meal_dtl'] == $menu['id']) {
                                                                    $background = 'bg-success text-white px-1';
                                                                    $total_price += $menu['price'];
                                                                    break;
                                                                } else {
                                                                    $background = '';
                                                                }
                                                            }
                                                            echo '<td class="col-2">';
                                                            $price_in_k = $menu['price'] / 1000 . 'k';   
                                                            echo '<span class="' . $background . '">' . $menu['name'] . ' - ' . $price_in_k . '</span><br>'; 
                                                            if (isset($child_menus[$menu['id_menu']])) { 
                                                                echo '<hr>';
                                                                foreach ($child_menus[$menu['id_menu']] as $child_menu) { 
                                                                    $c_menu_date = new DateTime($child_menu['date']);
                                                                    if($c_menu_date == $date_to_check) {
                                                                        $child_found = false;
                                                                        foreach ($detail_report as $report) {
                                                                            if ($report['id'] == $child_menu['id']) {
                                                                                $total_price += $child_menu['price'];
                                                                                $background = 'bg-success text-white px-1';
                                                                                break;
                                                                            } else {
                                                                                $background = '';
                                                                            }
                                                                        }
                                                                        $price_in_k = $child_menu['price'] / 1000 . 'k';   
                                                                        echo '<span class="' . $background . '">' . $child_menu['name'] . ' - ' . $price_in_k . '</span><br>';    
                                                                    }
                                                                }
                                                            }
                                                            echo '</td>';
                                                            $menu_found = true;
                                                            break;
                                                        }
                                                    }
                                                }

                                                if (!$menu_found) {
                                                    echo '<td class="col-2">-</td>';  // Display a blank cell if no menu found
                                                }
                                            }
                                        endfor;
                                    endforeach; ?>
                                </tr>
                                <tr class="tr">
                                    <td class="align-middle">Pasta</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $day_of_week = $begin_date->format('N');
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 1; $i <= 5; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify('-' . ($day_of_week - $i) . ' day');
                                            $is_holiday = false;
                                            $holiday_description = '';

                                            foreach ($holidays as $holiday) {
                                                $holiday_date = new DateTime($holiday['date']);

                                                if ($holiday_date == $date_to_check) {
                                                    $is_holiday = true;
                                                    $holiday_description = $holiday['description'];
                                                    break;
                                                }
                                            }

                                            if ($is_holiday == true) {
                                                echo '<td>' . $holiday_description . '</td>';
                                            } else {
                                                $menu_found = false;

                                                if ($i >= $day_of_week) {
                                                    foreach ($menu_pasta as $menu) {
                                                        $menu_date = new DateTime($menu['date']);

                                                        if ($menu_date == $date_to_check) {
                                                            $background = '';
                                                            foreach ($detail_report as $report) {
                                                                if ($report['id_po_purchase_meal_dtl'] == $report['id']) {
                                                                    $background = 'bg-success text-white px-1';
                                                                    $total_price += $menu['price'];
                                                                    break;
                                                                } else {
                                                                    $background = '';
                                                                }
                                                            }
                                                            echo '<td>';
                                                            $price_in_k = $menu['price'] / 1000 . 'k';   
                                                            echo '<span class="' . $background . '">' . $menu['name'] . ' - ' . $price_in_k . '</span><br>';    
                                                            echo '</td>';
                                                            $menu_found = true;
                                                            break;
                                                        }
                                                    }
                                                }

                                                if (!$menu_found) {
                                                    echo '<td>-</td>';  // Display a blank cell if no menu found
                                                }
                                            }
                                        endfor;
                                    endforeach; ?>
                                </tr>
                                <tr class="tr">
                                    <td class="align-middle">Breakfast & Stall</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $day_of_week = $begin_date->format('N');
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 1; $i <= 5; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify('-' . ($day_of_week - $i) . ' day');
                                            $is_holiday = false;
                                            $holiday_description = '';

                                            foreach ($holidays as $holiday) {
                                                $holiday_date = new DateTime($holiday['date']);

                                                if ($holiday_date == $date_to_check) {
                                                    $is_holiday = true;
                                                    $holiday_description = $holiday['description'];
                                                    break;
                                                }
                                            }

                                            if ($is_holiday == true) {
                                                echo '<td>' . $holiday_description . '</td>';
                                            } else {
                                                $menu_found = false;

                                                if ($i >= $day_of_week) {
                                                    foreach ($menu_breakfast as $menu) {
                                                        $menu_date = new DateTime($menu['date']);

                                                        if ($menu_date == $date_to_check) {
                                                            $background = '';
                                                            foreach ($detail_report as $report) {
                                                                if ($report['id_po_purchase_meal_dtl'] == $menu['id']) {
                                                                    $background = 'bg-success text-white px-1'; 
                                                                    $total_price += $menu['price'];
                                                                    break;
                                                                } else {
                                                                    $background = '';
                                                                }
                                                            }
                                                            echo '<td>';
                                                            $price_in_k = $menu['price'] / 1000 . 'k';   
                                                            echo '<span class="' . $background . '">' . $menu['name'] . ' - ' . $price_in_k . '</span><br>';    
                                                            echo '</td>';
                                                            $menu_found = true;
                                                            break;
                                                        }
                                                    }
                                                }

                                                if (!$menu_found) {
                                                    echo '<td>-</td>';  // Display a blank cell if no menu found
                                                }
                                            }
                                        endfor;
                                    endforeach; ?>
                                </tr>
                            </tbody>
                            <!-- Week 2 -->
                            <thead>
                                <tr>
                                <th rowspan="2" class="align-middle">Week 2</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thrusday</th>
                                <th>Friday</th>
                                </tr>
                                <tr>
                                    <?php foreach ($dates as $item) : ?>
                                        <?php
                                            $date = new DateTime($item['begin_date']);
                                            $day_of_week = $date->format('N');
                                            $date->modify('+7 day');
                                            $days_added = 0;

                                            // If the date is not a Monday, adjust the date to the previous Monday
                                            if ($day_of_week != 1) {
                                                $days_to_subtract = $day_of_week - 1;
                                                $date->modify("-$days_to_subtract day");
                                            }

                                            for ($i = 0; $days_added < 5; $i++) :
                                                echo '<th>' . $date->format('j M Y') . '</th>';
                                                $date->modify('+1 day');
                                                $days_added++;
                                            endfor;
                                    endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr">
                                    <td class="align-middle">Daily Set</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $day_of_week = $begin_date->format('N');
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 8; $i < 13; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify('-' . ($day_of_week - $i) . ' day');
                                            $is_holiday = false;
                                            $holiday_description = '';

                                            foreach ($holidays as $holiday) {
                                                $holiday_date = new DateTime($holiday['date']);

                                                if ($holiday_date == $date_to_check) {
                                                    $is_holiday = true;
                                                    $holiday_description = $holiday['description'];
                                                    break;
                                                }
                                            }

                                            if ($is_holiday == true) {
                                                echo '<td>' . $holiday_description . '</td>';
                                            } else {
                                                $menu_found = false;

                                                if ($i >= $day_of_week) {
                                                    foreach ($menu_daily_set as $menu) {
                                                        $menu_date = new DateTime($menu['date']);

                                                        if ($menu_date == $date_to_check) {
                                                            $background = '';
                                                            foreach ($detail_report as $report) {
                                                                if ($report['id_po_purchase_meal_dtl'] == $menu['id']) {
                                                                    $background = 'bg-success text-white px-1';
                                                                    $total_price += $menu['price'];
                                                                    break;
                                                                } else {
                                                                    $background = '';
                                                                }
                                                            }
                                                            echo '<td>';
                                                            $price_in_k = $menu['price'] / 1000 . 'k';   
                                                            echo '<span class="' . $background . '">' . $menu['name'] . ' - ' . $price_in_k . '</span><br>'; 
                                                            if (isset($child_menus[$menu['id_menu']])) { 
                                                                echo '<hr>';
                                                                foreach ($child_menus[$menu['id_menu']] as $child_menu) { 
                                                                    $c_menu_date = new DateTime($child_menu['date']);
                                                                    if($c_menu_date == $date_to_check) {
                                                                        foreach ($detail_report as $report) {
                                                                            if ($report['id'] == $child_menu['id']) {
                                                                                $background = 'bg-success text-white px-1';
                                                                                $total_price += $child_menu['price'];
                                                                                break;
                                                                            } else {
                                                                                $background = '';
                                                                            }
                                                                        }
                                                                        $price_in_k = $child_menu['price'] / 1000 . 'k';   
                                                                        echo '<span class="' . $background . '">' . $child_menu['name'] . ' - ' . $price_in_k . '</span><br>';    
                                                                    }
                                                                }
                                                            }
                                                            echo '</td>';
                                                            $menu_found = true;
                                                            break;
                                                        }
                                                    }
                                                }
                                                if (!$menu_found) {
                                                    echo '<td>-</td>';  // Display a blank cell if no menu found
                                                }
                                            }
                                        endfor;
                                    endforeach; ?>
                                </tr>
                                <tr class="tr">
                                    <td class="align-middle">Pasta</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $day_of_week = $begin_date->format('N');
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 8; $i < 13; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify('-' . ($day_of_week - $i) . ' day');
                                            $is_holiday = false;
                                            $holiday_description = '';

                                            foreach ($holidays as $holiday) {
                                                $holiday_date = new DateTime($holiday['date']);

                                                if ($holiday_date == $date_to_check) {
                                                    $is_holiday = true;
                                                    $holiday_description = $holiday['description'];
                                                    break;
                                                }
                                            }

                                            if ($is_holiday == true) {
                                                echo '<td>' . $holiday_description . '</td>';
                                            } else {
                                                $menu_found = false;

                                                if ($i >= $day_of_week) {
                                                    foreach ($menu_pasta as $menu) {
                                                        $menu_date = new DateTime($menu['date']);

                                                        if ($menu_date == $date_to_check) {
                                                            $background = '';
                                                            foreach ($detail_report as $report) {
                                                                if ($report['id_po_purchase_meal_dtl'] == $menu['id']) {
                                                                    $background = 'bg-success text-white px-1';
                                                                    $total_price += $menu['price'];
                                                                    break;
                                                                } else {
                                                                    $background = '';
                                                                }
                                                            }
                                                            echo '<td>';
                                                            $price_in_k = $menu['price'] / 1000 . 'k';   
                                                            echo '<span class="' . $background . '">' . $menu['name'] . ' - ' . $price_in_k . '</span><br>'; 
                                                            echo '</td>';
                                                            $menu_found = true;
                                                            break;
                                                        }
                                                    }
                                                }

                                                if (!$menu_found) {
                                                    echo '<td>-</td>';  // Display a blank cell if no menu found
                                                }
                                            }
                                        endfor;
                                    endforeach; ?>
                                </tr>
                                <tr class="tr">
                                    <td class="align-middle">Breakfast & Stall</td>
                                    <?php foreach ($dates as $item) :
                                        $begin_date = new DateTime($item['begin_date']);
                                        $day_of_week = $begin_date->format('N');
                                        $end_date = clone $begin_date;
                                        $end_date->modify('+5 day');

                                        for ($i = 8; $i < 13; $i++) :
                                            $date_to_check = clone $begin_date;
                                            $date_to_check->modify('-' . ($day_of_week - $i) . ' day');
                                            $is_holiday = false;
                                            $holiday_description = '';

                                            foreach ($holidays as $holiday) {
                                                $holiday_date = new DateTime($holiday['date']);

                                                if ($holiday_date == $date_to_check) {
                                                    $is_holiday = true;
                                                    $holiday_description = $holiday['description'];
                                                    break;
                                                }
                                            }

                                            if ($is_holiday == true) {
                                                echo '<td>' . $holiday_description . '</td>';
                                            } else {
                                                $menu_found = false;

                                                if ($i >= $day_of_week) {
                                                    foreach ($menu_breakfast as $menu) {
                                                        $menu_date = new DateTime($menu['date']);

                                                        if ($menu_date == $date_to_check) {
                                                            $background = '';
                                                            foreach ($detail_report as $report) {
                                                                if ($report['id_po_purchase_meal_dtl'] == $menu['id']) {
                                                                    $background = 'bg-success text-white px-1';
                                                                    $total_price += $menu['price'];
                                                                    break;
                                                                } else {
                                                                    $background = '';
                                                                }
                                                            }
                                                            echo '<td>';
                                                            $price_in_k = $menu['price'] / 1000 . 'k';   
                                                            echo '<span class="' . $background . '">' . $menu['name'] . ' - ' . $price_in_k . '</span><br>'; 
                                                            echo '</td>';
                                                            $menu_found = true;
                                                            break;
                                                        }
                                                    }
                                                }

                                                if (!$menu_found) {
                                                    echo '<td>-</td>';  // Display a blank cell if no menu found
                                                }
                                            }
                                        endfor;
                                    endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <button class="btn btn-warning btn-lg float-right"
                            type="">
                        Total Price: <?php echo $total_price / 1000 . 'k'; ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>