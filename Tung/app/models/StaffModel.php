<?php

/**
 *
 */
class StaffModel
{
    public $id;
    public $business_name;
    public $business_phone;
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
    public $role;

    function __construct($id = null,
                         $business_name = null,
                         $business_phone = null,
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
                         $role = null)
    {
        $this->id = $id;
        $this->business_name = $business_name;
        $this->business_phone = $business_phone;
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
        $this->role = $role;
    }

    /**
     *    Hàm lấy 1 bản ghi từ csdl với id truyền vào
     */
    public static function GetOne($id)
    {
        $db = Db::GetInstance(); // Lấy kết nối đến db từ đối tượng Db (nằm trong file connection.php)
        $stmt = $db->prepare("
				select 	st.id as id,
						st.business_name as business_name,
						st.business_phone as business_phone,
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
						st.role as role
				from staff as st
				where st.id = :id
			");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $rs = $stmt->fetch();
        if ($rs) {
            $result = new StaffModel($rs["id"], $rs["business_name"], $rs["business_phone"], $rs["user_name"], $rs["email"], $rs["password"], $rs["first_name"], $rs["last_name"], $rs["address"], $rs["city"], $rs["country"], $rs["postal_code"], $rs["description"], $rs["role"]);
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
						st.business_name as business_name,
						st.business_phone as business_phone,
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
						st.role as role
				from staff as st
				where st.user_name = :user_name and st.password = :password
			");

        $stmt->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $stmt->bindParam(':password', $pass, PDO::PARAM_STR);
        $stmt->execute();
        $rs = $stmt->fetch();

        if ($rs) {
            $result = new StaffModel($rs["id"], $rs["business_name"], $rs["business_phone"], $rs["user_name"], $rs["email"], $rs["password"], $rs["first_name"], $rs["last_name"], $rs["address"], $rs["city"], $rs["country"], $rs["postal_code"], $rs["description"], $rs["role"]);
        } else {
            $result = null;
        }

        return $result;
    }
}

?>