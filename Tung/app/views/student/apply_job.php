<div class="col-md-12 candidate-list">
    <div class="col-md-6">
    <?php
    if (!empty($studentApplyJobs['data'])) {
        foreach ($studentApplyJobs['data'] as $item) {
            $resume = !empty($item['resume2']) ? $item['resume2'] : $item['resume'];
    ?>
        <div class="card card-can">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="#"><?php echo $item['first_name'] . ' ' . $item['last_name'] ?></a>
                </h4>
                <p><?php echo $item['title'] ?></p>
            </div>
<!--            <div class="card-body">-->
<!--                <h6>-->
<!--                    --><?php //if ($item['cover_letter'] && $item['resume'] && $item['selection_criteria']): ?>
<!--                        <button class="btn btn-outline-success btn-round btn-icon">-->
<!--                            <i class="now-ui-icons ui-1_check"></i>-->
<!--                        </button>-->
<!--                    --><?php //else: ?>
<!--                        <button class="btn btn-outline-danger btn-round btn-icon">-->
<!--                            <i class="now-ui-icons ui-1_simple-remove"></i>-->
<!--                        </button>-->
<!--                    --><?php //endif; ?>
<!--                    --><?php //echo $item['experience'] ?><!-- years of experience-->
<!--                </h6>-->
<!--                <h6>-->
<!--                    --><?php //if ($item['cover_letter'] && $item['resume'] && $item['selection_criteria']): ?>
<!--                    <button class="btn btn-outline-success btn-round btn-icon">-->
<!--                        <i class="now-ui-icons ui-1_check"></i>-->
<!--                    </button>-->
<!--                    --><?php //else: ?>
<!--                        <button class="btn btn-outline-danger btn-round btn-icon">-->
<!--                            <i class="now-ui-icons ui-1_simple-remove"></i>-->
<!--                        </button>-->
<!--                    --><?php //endif; ?>
<!--                    Right to work in Australia-->
<!--                </h6>-->
<!--            </div>-->
            <div class="card-footer">
                <div class="btn-group">
                    <button type="button" onclick="readPdf('<?php echo $resume ?>')" class="btn <?php echo empty($resume) ? 'btn-danger' : 'btn-info' ?>">
                        Resume
                    </button>
                    <button type="button" onclick="readPdf('<?php echo $item['cover_letter'] ?>')" class="btn <?php echo empty($item['cover_letter']) ? 'btn-danger' : 'btn-info' ?>">
                        Cover letter
                    </button>
                    <button type="button" onclick="readPdf('<?php echo $item['selection_criteria'] ?>')" class="btn <?php echo empty($item['selection_criteria']) ? 'btn-danger' : 'btn-info' ?>">
                        Selection Criteria
                    </button>
                </div>
                <div class="btn-group pull-right">
                    <a onclick="shortList(<?php echo $item['id'] ?>)" class="btn <?php echo $item['status_approve'] == 1 ? 'btn-success' : 'btn-outline-success' ?>">
                        <i class="now-ui-icons ui-1_check"></i>
                        Short list
                    </a>
                    <a onclick="notSuitable(<?php echo $item['id'] ?>)" class="btn <?php echo $item['status_approve'] == 2 ? 'btn-danger' : 'btn-outline-danger' ?> ml-2">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                        Not suitable
                    </a>
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