<style>
    .pagination-link a {
        color: grey;
    }
</style>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="title-5 m-b-35">Report List</h3>
                            <!-- DATA TABLE -->
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>po title</th>
                                            <th>begin date</th>
                                            <th>end date</th>
                                            <th>view all customer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($report as $rpt) : 
                                                if($rpt != null) { // Check if $vrpt is not null
                                            ?>
                                                <tr class="tr-shadow">
                                                    <td><?= ++$page ?></td>
                                                    <td><?= $rpt['remark']; ?></td>
                                                    <td><?= $rpt['begin_date']; ?></td>
                                                    <td><?= $rpt['end_date']; ?></td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a
                                                            class="item"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="View"
                                                            href="<?= base_url(); ?>report/view_report/<?= $rpt['id']; ?>"
                                                            >
                                                            <i class="zmdi zmdi-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php  // Increment $no variable
                                            }
                                        endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="pagination-link">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>