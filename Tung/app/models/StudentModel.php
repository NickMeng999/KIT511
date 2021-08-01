<?php

/**
 *
 */
class StudentModel
{
    public $id;
    public $company;
    public $position;
    public $user_name;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $address;
    public $city;
    public $country;
    public $postal_code;
    public $description;
    public $resume;

    function __construct($id = null,
                         $company = null,
                         $position = null,
                         $user_name = null,
                         $email = null,
                         $password = null,
                         $first_name = null,
                         $last_name = null,
                         $address = null,
                         $city = null,
                         $country = null,
                         $postal_code = null,
                         $description = null,
                         $resume = null)
    {
        $this->id = $id;
        $this->company = $company;
        $this->position = $position;
        $this->user_name = $user_name;
        $this->email = $email;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->city = $city;
        $this->country = $country;
        $this->postal_code = $postal_code;
        $this->description = $description;
        $this->resume = $resume;
    }

    /**
     *    Hàm lấy 1 bản ghi từ csdl với id truyền vào
     */
    public static function GetOne($id)
    {
        $db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
        $stmt = $db->prepare("
				select 	st.id as id,
						st.company as company,
						st.position as position,
						st.user_name as user_name,
						st.email as email,
						st.password as password,
						st.first_name as first_name,
						st.last_name as last_name,
						st.address as address,
						st.city as city,
						st.country as country,
						st.postal_code as postal_code,
						st.description as description,
						st.resume as resume
				from student as st
				where st.id = :id
			");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $rs = $stmt->fetch();
        if ($rs) {
            $result = new StudentModel($rs["id"], $rs["company"], $rs["position"], $rs["user_name"], $rs["email"], $rs["password"], $rs["first_name"], $rs["last_name"], $rs["address"], $rs["city"], $rs["country"], $rs["postal_code"], $rs["description"], $rs["resume"]);
        } else {
            $result = null;
        }

        return $result;
    }

    public static function login($userName, $pass)
    {
        $pass = md5($pass);

        $db = Db::GetInstance();
        $stmt = $db->prepare("
				select 	st.id as id,
						st.company as company,
						st.position as position,
						st.user_name as user_name,
						st.email as email,
						st.password as password,
						st.first_name as first_name,
						st.last_name as last_name,
						st.address as address,
						st.city as city,
						st.country as country,
						st.postal_code as postal_code,
						st.description as description,
						st.resume as resume
				from student as st
				where st.user_name = :user_name and st.password = :password
			");

        $stmt->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $stmt->bindParam(':password', $pass, PDO::PARAM_STR);
        $stmt->execute();
        $rs = $stmt->fetch();

        if ($rs) {
            $result = new StudentModel($rs["id"], $rs["company"], $rs["position"], $rs["user_name"], $rs["email"], $rs["password"], $rs["first_name"], $rs["last_name"], $rs["address"], $rs["city"], $rs["country"], $rs["postal_code"], $rs["description"], $rs["resume"]);
        } else {
            $result = null;
        }

        return $result;
    }
}

?>