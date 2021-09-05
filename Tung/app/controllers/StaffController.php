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
                $_SESSION["staff_role"] = $staff->role;

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

    /**
     * update staff
     */
    public function updateProfile()
    {
        $data = $_POST;
        $err = [];

        if (empty($data['business_name'])) $err['business_name'] = "business name name is not empty";
        if (empty($data['business_phone'])) $err['business_phone'] = "business phone is not empty";
        if (empty($data['user_name'])) $err['user_name'] = "user name is not empty";
        if (empty($data['email'])) $err['email'] = "email is not empty";
        if (empty($data['first_name'])) $err['first_name'] = "First name is not empty";
        if (empty($data['last_name'])) $err['last_name'] = "Last name is not empty";
        if (empty($data['address'])) $err['address'] = "Address name is not empty";
        if (empty($data['city'])) $err['city'] = "City name is not empty";
        if (empty($data['country'])) $err['country'] = "Country name is not empty";
        if (empty($data['postal_code'])) $err['postal_code'] = "Postal code name is not empty";
        if (empty($data['description'])) $err['description'] = "About your business is not empty";

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $err['email'] = "Invalid email format";
        }

        if (!is_numeric($data['business_phone'])) {
            $err['business_phone'] = "Invalid business phone";
        }

        if (empty($err)) {
            StaffModel::updateProfile($data);

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