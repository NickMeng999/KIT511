<?php session_start();
function Call($controller, $action)
{
    require_once("./app/controllers/" . $controller . "Controller.php");
    switch ($controller) {
        case 'Staff':
            require_once("./app/models/StaffModel.php");
            $ctr = new StaffController();
            $ctr->{$action}();
            break;
        case 'Student':
            require_once("./app/models/StudentModel.php");
            $ctr = new StudentController();
            $ctr->{$action}();
            break;
        default:
            require_once("./app/models/StudentModel.php");
            $ctr = new StudentController();
            $ctr->NotFound();
            break;
    }
}

$listCtr = [
    "Student" => ["profile", "getDataProfile", "notFound", "login", "logout"],
    "Staff" => ["profile", "getDataProfile", "notFound", "login", "logout"],
];

if (!isset($_SESSION["username"])) {
    $ctr = "Student";
    $action = "login";
    Call($ctr, $action);
} else {
    if (array_key_exists($ctr, $listCtr)) {
        if (in_array($action, $listCtr[$ctr])) {
            Call($ctr, $action);
        } else {
            $ctr = "Student";
            $action = "notFound";
            Call($ctr, $action);
        }
    } else {
        $ctr = "Student";
        $action = "NotFound";
        Call($ctr, $action);
    }
}


?>