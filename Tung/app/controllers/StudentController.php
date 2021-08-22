<?php

class StudentController
{
    public function home()
    {
        include "./app/views/student/home.php";
    }

    /**
     * View student profile
     */
    public function profile()
    {
        $jobs = JobModel::getByJobType();
        $jobInterns = JobModel::getByJobType(2);
        $jobTypes = JobTypeModel::getAll();
        $checkEducation = EducationModel::checkEducationStudent($_SESSION['student_id']);
        $education = EducationModel::getByStudent($_SESSION['student_id']);

        include "./app/views/student/profile.php";
    }

    /**
     * Ajax data student
     *
     * @return StudentModel|null
     */
    public function getDataProfile()
    {
        $id = $_SESSION['student_id'];
        $student = StudentModel::GetOne($id);

        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        if (!empty($student)) {
            echo json_encode([
                'status' => true,
                'info' => $student,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'err' => 'This user is unavailable',
            ]);
        }
        exit();
    }

    /**
     *
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['user_name'])) {
                $u = $_POST['user_name'];
            }

            if (isset($_POST['password'])) {
                $p = $_POST['password'];
            }

            if (isset($u) && isset($p)) {
                $student = StudentModel::login($u, $p);
            }

            if (!empty($student)) {
                $_SESSION["username"] = $_POST['user_name'];
                $_SESSION["student_id"] = $student->id;
                header('Access-Control-Allow-Origin: *');
                header('Content-type: application/json');
                echo json_encode([
                    'status' => true,
                    'err' => '',
                ]);
                exit();
            } else {
                header('Access-Control-Allow-Origin: *');
                header('Content-type: application/json');
                echo json_encode([
                    'status' => false,
                    'err' => 'This user is unavailable',
                ]);
                exit();
            }
        } else {
            include './app/views/student/login.php';
        }
    }

    /**
     * update student
     */
    public function updateProfile()
    {
        $data = $_POST;
        $err = [];

        if (empty($data['user_name'])) $err['user_name'] = "User name is not empty";
        if (empty($data['email'])) $err['email'] = "Email is not empty";
        if (empty($data['first_name'])) $err['first_name'] = "First name is not empty";
        if (empty($data['last_name'])) $err['last_name'] = "Last name is not empty";
        if (empty($data['address'])) $err['address'] = "Address name is not empty";
        if (empty($data['city'])) $err['city'] = "City name is not empty";
        if (empty($data['country'])) $err['country'] = "Country name is not empty";
        if (empty($data['postal_code'])) $err['postal_code'] = "Postal code name is not empty";

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $err['email'] = "Invalid email format";
        }

        if (empty($err)) {
            StudentModel::updateProfile($data);

            echo json_encode([
                'status' => true,
                'err' => '',
            ]);
            exit();
        } else {
            echo json_encode([
                'status' => false,
                'err' => $err,
            ]);
            exit();
        }
    }

    public function changeEducation()
    {
        $data = $_POST;
        $err = [];

        if (empty($data['school'])) $err['school'] = "School is not empty";
        if (empty($data['degree'])) $err['degree'] = "Degree is not empty";
        if (empty($data['field_of_study'])) $err['field_of_study'] = "Field of study is not empty";
        if (empty($data['grade'])) $err['grade'] = "Grade is not empty";
        if (empty($data['start_year'])) $err['start_year'] = "Start year is not empty";
        if (empty($data['end_year'])) $err['end_year'] = "End year is not empty";

        if (empty($err)) {
            EducationModel::changeEducation($data);

            echo json_encode([
                'status' => true,
                'err' => '',
            ]);
            exit();
        } else {
            echo json_encode([
                'status' => false,
                'err' => $err,
            ]);
            exit();
        }
    }

    public function removeEducation()
    {
        EducationModel::remove();

        echo json_encode([
            'status' => true,
            'err' => '',
        ]);
        exit();
    }

    public function logout()
    {
        unset ($_SESSION["username"]);
        unset ($_SESSION["student_id"]);
        header("location:?ctr=Student&action=home");
    }

    public function notFound(){
        include './app/views/notfound.php';
    }

    /**
     * Upload resume
     */
    public function uploadResume()
    {
        if($_FILES['file']['name'] != ''){
            $file = explode('.', $_FILES['file']['name']);
            $extension = end($file);

            $name = 'student_'. $_SESSION['student_id'] .'.'.$extension;

            $location = './app/uploads/' . $name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            StudentModel::updateResumeProfile($location);
            header('Access-Control-Allow-Origin: *');
            header('Content-type: application/json');
            echo json_encode([
                'status' => true,
                'resume' => $location,
            ]);
            exit();
        }
    }
}

?>