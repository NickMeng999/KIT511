<div class="col-md-12 candidate-list">
    <div class="col-md-6">
    <?php
    if (!empty($studentApplyJobs['data'])) {
        foreach ($studentApplyJobs['data'] as $item) {
    ?>
        <div class="card card-can">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="#"><?php echo $item['first_name'] . ' ' . $item['last_name'] ?></a>
                </h4>
                <p><?php echo $item['title'] ?></p>
            </div>
            <div class="card-body">
                <h6>
                    <button class="btn btn-outline-success btn-round btn-icon">
                        <i class="now-ui-icons ui-1_check"></i>
                    </button>
                    4 years of experience
                    <button class="ml-3 btn btn-outline-success btn-round btn-icon">
                        <i class="now-ui-icons ui-1_check"></i>
                    </button>
                    Right to work in Australia
                </h6>
                <h6>
                    <button class="btn btn-outline-danger btn-round btn-icon">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    Driver license
                </h6>
            </div>
            <div class="card-footer">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-info">
                        Resume
                    </button>
                    <button type="button" class="btn btn-info">
                        Cover letter
                    </button>
                </div>
                <div class="btn-group pull-right">
                    <button class="btn btn-outline-success">
                        <i class="now-ui-icons ui-1_check"></i>
                        Short list
                    </button>
                    <button class="btn btn-outline-danger ml-2">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                        Not suitable
                    </button>
                </div>
            </div>
        </div>
    <?php
    }}
    ?>
    </div>
</div>
<nav class="job-pagination" aria-label="pagination">
    <ul class="pagination">
        <li class="page-item">
            <a href="javascript:void(0)" class="page-link" onclick="prevPage()"><span aria-hidden="true"><i class="fa fa-angle-double-left"
                                                                      aria-hidden="true"></i></span></a>
        </li>
        <?php
        if ($studentApplyJobs['total']) {
        for ($i = 1; $i <= $studentApplyJobs['total']; $i++) {
        ?>
        <li class="page-item page-<?php echo $i ?>">
            <a href="javascript:void(0)" class="page-link" onclick="changePage(<?php echo $i ?>)"><?php echo $i ?></a>
        </li>
        <?php }} ?>
        <li class="page-item">
            <a href="javascript:void(0)" class="page-link" onclick="nextPage()"><span aria-hidden="true"><i class="fa fa-angle-double-right"
                                                                      aria-hidden="true"></i></span></a>
        </li>
    </ul>
</nav>
<input type="hidden" name="total_page" value="<?php echo $studentApplyJobs['total'] ?>" />