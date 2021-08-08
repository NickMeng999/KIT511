<?php

class StaffController
{
    /**
     * View staff profile
     */
    public function profile()
    {
        $jobTypes = JobTypeModel::getAll();

        include "./app/views/staff/profile.php";
    }

    /**
     * Ajax data staff
     *
     * @return StaffModel|null
     */
    public function getDataProfile()
    {
        $id = $_SESSION['staff_id'];
        $staff = StaffModel::GetOne($id);

        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        if (!empty($staff)) {
            echo json_encode([
                'status' => true,
                'info' => $staff,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'err' => 'This staff is unavailable',
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
                $staff = StaffModel::login($u, $p);
            }

            if (!empty($staff)) {
                $_SESSION["staff_name"] = $_POST['user_name'];
                $_SESSION["staff_id"] = $staff->id;

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
                    'err' => 'This staff is unavailable',
                ]);
                exit();
            }
        } else {
            include './app/views/staff/login.php';
        }
    }

    public function logout()
    {
        unset ($_SESSION["staff_name"]);
        unset ($_SESSION["staff_id"]);
        header("location:?ctr=Student&action=home");
    }

    public function notFound(){
        include './app/views/notfound.php';
    }
}

?>