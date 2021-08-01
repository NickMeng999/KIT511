<?php

class StudentController
{
    /**
     * View student profile
     */
    public function profile()
    {
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

    public function logout()
    {
        session_destroy();
        header("location:?ctr=Student&action=login");
    }

    public function notFound(){
        include './app/views/notfound.php';
    }
}

?>