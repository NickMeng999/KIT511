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
                                            <a href='?ctr=Job&action=detail&id={$job->id}'>{$job->title}</a>
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

        if ($_SESSION['staff_role'] == 'super_admin') {
            $id = null;
        }

        $jobsByStaffId = JobModel::getByStaffId($id);
        $jobTypes = JobTypeModel::getAll();

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

    public function shortList()
    {
        $id = $_POST['id'];

        JobModel::shortList($id);

        echo json_encode([
            'status' => true
        ]);
    }

    public function notSuitable()
    {
        $id = $_POST['id'];

        JobModel::notSuitable($id);

        echo json_encode([
            'status' => true
        ]);
    }

    public function uploadPdf()
    {
        $err = [];

//        if (empty($_FILES['cover_letter']['name'])) {
//            $err['cover_letter'] = 'Please upload cover letter pdf';
//        }
//
//        if (empty($_FILES['selection_criteria']['name'])) {
//            $err['selection_criteria'] = 'Please upload selection criteria pdf';
//        }

        if (!empty($err)) {
            header('Access-Control-Allow-Origin: *');
            header('Content-type: application/json');
            echo json_encode([
                'status' => false,
                'err' => $err,
            ]);
            exit();
        }

        $locationResume = '';
        $locationCoverLetter = '';
        $locationSelectionCriteria = '';
        $data = [];
        if($_FILES['resume']['name'] != ''){
            $file = explode('.', $_FILES['resume']['name']);
            $extension = end($file);

            $name = 'student_job_resume_'. $_POST['id'] .'.'.$extension;

            $locationResume = './app/uploads/' . $name;
            move_uploaded_file($_FILES['resume']['tmp_name'], $locationResume);
        }

        if($_FILES['cover_letter']['name'] != ''){
            $file = explode('.', $_FILES['cover_letter']['name']);
            $extension = end($file);

            $name = 'student_job_cover_letter_'. $_POST['id'] .'.'.$extension;

            $locationCoverLetter = './app/uploads/' . $name;
            move_uploaded_file($_FILES['cover_letter']['tmp_name'], $locationCoverLetter);
        }

        if($_FILES['selection_criteria']['name'] != ''){
            $file = explode('.', $_FILES['selection_criteria']['name']);
            $extension = end($file);

            $name = 'student_job_selection_criteria_'. $_POST['id'] .'.'.$extension;

            $locationSelectionCriteria = './app/uploads/' . $name;
            move_uploaded_file($_FILES['selection_criteria']['tmp_name'], $locationSelectionCriteria);
        }

        $data['job_id'] = $_POST['id'];
        $data['resume'] = $locationResume;
        $data['cover_letter'] = $locationCoverLetter;
        $data['selection_criteria'] = $locationSelectionCriteria;

        $createStudentJob = JobModel::applyJobByStudent($data);

        if ($createStudentJob) {
            header('Access-Control-Allow-Origin: *');
            header('Content-type: application/json');
            echo json_encode([
                'status' => true,
            ]);
            exit();
        } else {
            header('Access-Control-Allow-Origin: *');
            header('Content-type: application/json');
            echo json_encode([
                'status' => false,
                'err' => ['exist' => 'Students have applied for jobs'],
            ]);
            exit();
        }
    }

    public function addJob()
    {
        $data = $_POST;
        $err = [];

        if (empty($data['title'])) {
            $err['title'] = 'Title is required';
        }
        if (empty($data['country'])) {
            $err['country'] = 'Country is required';
        }
        if (empty($data['job_type'])) {
            $err['job_type'] = 'Job type is required';
        }
        if (empty($data['time_type'])) {
            $err['time_type'] = 'Work type is required';
        }
        if (empty($data['job_category'])) {
            $err['job_category'] = 'Job category is required';
        }
        if (empty($data['salary'])) {
            $err['salary'] = 'Salary is required';
        }
        if (empty($data['description'])) {
            $err['description'] = 'Description is required';
        }
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');

        if (!empty($err)) {
            echo json_encode([
                'status' => false,
                'err' => $err,
            ]);
            exit();
        }

        JobModel::addJob($data);

        echo json_encode([
            'status' => true,
        ]);
        exit();
    }

    public function editJob()
    {
        $data = $_POST;
        $err = [];

        if (empty($data['title'])) {
            $err['title'] = 'Title is required';
        }
        if (empty($data['country'])) {
            $err['country'] = 'Country is required';
        }
        if (empty($data['job_type'])) {
            $err['job_type'] = 'Job type is required';
        }
        if (empty($data['time_type'])) {
            $err['time_type'] = 'Work type is required';
        }
        if (empty($data['job_category'])) {
            $err['job_category'] = 'Job category is required';
        }
        if (empty($data['salary'])) {
            $err['salary'] = 'Salary is required';
        }
        if (empty($data['description'])) {
            $err['description'] = 'Description is required';
        }
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');

        if (!empty($err)) {
            echo json_encode([
                'status' => false,
                'err' => $err,
            ]);
            exit();
        }

        JobModel::editJob($data);

        echo json_encode([
            'status' => true
        ]);
        exit();
    }

    public function removeJob()
    {
        JobModel::removeJob($_POST['id']);

        echo json_encode([
            'status' => true
        ]);
        exit();
    }
}

?>