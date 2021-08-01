<?php

class StaffController
{
    /**
     * View staff profile
     */
    public function profile()
    {
        include "./app/views/staff/profile.php";
    }

    /**
     * Ajax data staff
     *
     * @return StaffModel|null
     */
    public function getDataProfile()
    {
        $id = $_SESSION['student_id'];
        $staff = StaffModel::GetOne($id);

        return $staff;
    }

    /**
     *
     */
    public function login()
    {
        if (isset($_POST['txtUsername'])) {
            $u = $_POST['txtUsername'];
        }

        if (isset($_POST['txtPassword'])) {
            $p = $_POST['txtPassword'];
        }

        if (isset($u) && isset($p)) {
            $staff = StaffModel::login($u, $p);
        }

        if (isset($staff)) {
            if (count($staff) > 0) {
                $_SESSION["username"] = $_POST['txtUsername'];
                $_SESSION["id"] = $staff->id;
                header("location:?ctr=Staff&action=profile");
            } else {
                $err = "";
            }
        } else {
            $err = "This user is unavailable";
        }
        include './app/views/login.php';
    }

    public function logout()
    {
        session_destroy();
        header("location:?ctr=Staff&action=login");
    }

    public function notFound(){
        include './app/views/notfound.php';
    }
}

?>