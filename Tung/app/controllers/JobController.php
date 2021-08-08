<?php

class JobController
{
    /**
     * Ajax data job
     *
     * @return JobModel|null
     */
    public function paginateJobs()
    {
        $currentPage = $_POST['current_page'];
        $jobType = $_POST['job_type'];
        $country = $_POST['country'];
        $category = $_POST['category'];
        $jobs = JobModel::getByJobType($category, $jobType, $country, $currentPage);

        $textApply = '';
        if (!empty($jobs['data'])) {
            foreach ($jobs['data'] as $job) {
                $card = "card-job";
                $pre = "prevPage()";
                $next = "nextPage()";
                if ($category == 2) {
                    $card = "card-intern";
                    $pre = "prevPageIntern()";
                    $next = "nextPageIntern()";
                }

                $textApply .= "<div class='card {$card}'>
                                    <div class='card-header'>
                                        <h4 class='card-title'>
                                            <a href='job.html'>{$job->title}</a>
                                        </h4>
                                        <img class='img' src='{$job->image}'>
                                    </div>
                                    <div class='card-body'>
                                        <p>
                                        {$job->description}
                                        </p>
                                        <h6>
                                            <i class='ti-time'></i>
                                            {$job->last_date}                                                    
                                        </h6>
                                    </div>
                                    <hr>
                                    <div class='card-footer'>
                                        <div class='stats'>
                                            <i class='now-ui-icons ui-2_favourite-28'></i>
                                            Save
                                        </div>
                                    </div>
                                </div>";

            }
        }

        $textApplyPaginate = "<li class='page-item'>
                                        <a href='javascript:void(0)' onclick='{$pre}' class='page-link'>
                                        <span aria-hidden='true'>
                                            <i class='fa fa-angle-double-left' aria-hidden='true'></i>
                                        </span>
                                        </a>
                                    </li>";
        if ($jobs['total']) {
            for ($i = 1; $i <= $jobs['total']; $i++) {
                $active = ($i == 1) ? 'active' : '';
                $changePage = $category == 1 ? "changePage($i)" : "changePageIntern($i)";
                $pageClass = $category == 1 ? "page-$i" : "page-intern-$i";
                $pageItemClass = $category == 1 ? "page-item-job" : "page-item-intern";
                $textApplyPaginate .= "<li class='page-item $pageItemClass $pageClass $active'>
                                        <a href='javascript:void(0)' class='page-link' onclick='{$changePage}'>$i</a>
                                    </li>";
            }
        }

        $textApplyPaginate .= "<li class=\"page-item\">
                                        <a href=\"javascript:void(0)\" onclick=\"{$next}\" class=\"page-link\">
                                        <span aria-hidden=\"true\">
                                            <i class=\"fa fa-angle-double-right\" aria-hidden=\"true\"></i>
                                        </span>
                                        </a>
                                    </li>";

        $jobs['text'] = $textApply;
        $jobs['paginate'] = $textApplyPaginate;
        unset($jobs['data']);

        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        if (!empty($jobs)) {
            echo json_encode([
                'status' => true,
                'info' => $jobs,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'err' => 'fail',
            ]);
        }
        exit();
    }

    public function getByStaffId()
    {
        $id = $_SESSION['staff_id'];

        $jobsByStaffId = JobModel::getByStaffId($id);

        ob_start();
        include "./app/views/staff/job_table.php";
        $template = ob_get_clean();

        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        if (!empty($jobsByStaffId)) {
            echo json_encode([
                'status' => true,
                'info' => $template,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'err' => 'fail',
            ]);
        }
        exit();
    }

    public function paginateStudentApplyJobs()
    {
        $currentPage = $_POST['current_page'];
        $jobType = $_POST['job_type'];
        $country = $_POST['country'];
        $studentApplyJobs = JobModel::studentsApplyJob($jobType, $country, $currentPage);

        ob_start();
        include "./app/views/student/apply_job.php";
        $template = ob_get_clean();

        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        if (!empty($studentApplyJobs)) {
            echo json_encode([
                'status' => true,
                'info' => $template,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'err' => 'fail',
            ]);
        }
        exit();
    }

    public function detail()
    {
        $id = $_GET['id'];
        $job = JobModel::getDetail($id);

        include './app/views/job/detail.php';
    }
}

?>