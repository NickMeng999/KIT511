<?php

/**
 *
 */
class JobModel
{
    public $id;
    public $staff_id;
    public $title;
    public $description;
    public $content;
    public $salary;
    public $country;
    public $last_date;
    public $job_type;
    public $job_category;
    public $time_type;
    public $image;
    public $created_at;

    function __construct($id = null,
                         $staff_id = null,
                         $title = null,
                         $content = null,
                         $description = null,
                         $salary = null,
                         $country = null,
                         $last_date = null,
                         $job_type = null,
                         $job_category = null,
                         $time_type = null,
                         $image = null,
                         $created_at = null)
    {
        $this->id = $id;
        $this->staff_id = $staff_id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->salary = $salary;
        $this->country = $country;
        $this->last_date = $last_date;
        $this->job_type = $job_type;
        $this->job_category = $job_category;
        $this->time_type = $time_type;
        $this->image = $image;
        $this->created_at = $created_at;
    }

    public static function getByJobType($jobCategory = 1, $jobType = null, $country = null, $currentPage = 1, $limit = 3)
    {
        $db = Db::GetInstance();

        $sqlTotal = "
				select id
				from job 
				where job_category = {$jobCategory} 
			";

        $positionStart = ($currentPage - 1) * $limit;

        $sql = "
				select 	j.id as id,
						j.staff_id as staff_id,
						j.title as title,
						j.description as description,
						j.content as content,
						j.salary as salary,
						j.country as country,
						j.last_date as last_date,
						j.job_type as job_type,
						j.job_category as job_category,
						j.time_type as time_type,
						j.image as image,
						j.created_at as created_at
				from job as j 
				where j.job_category = {$jobCategory} 
			";

        if (!empty($jobType)) {
            $sql .= "and j.job_type in ({$jobType}) ";
            $sqlTotal .= "and job_type in ({$jobType}) ";
        }

        if (!empty($country)) {
            $sql .= "and j.country like '%{$country}%' ";
            $sqlTotal .= "and country like '%{$country}%' ";
        }

        $sql .= "limit {$positionStart}, {$limit} ";

        $stmt = $db->prepare($sql);
        $stmtTotal = $db->prepare($sqlTotal);

        $stmt->execute();
        $rs = $stmt->fetchAll();

        $stmtTotal->execute();
        $total = $stmtTotal->rowCount();
        $total = ceil($total / $limit);
        
        $arr = [];
        if (count($rs) > 0) {
            foreach ($rs as $v) {
                array_push($arr,
                    new JobModel($v["id"], $v["staff_id"], $v["title"], $v["description"], $v["content"], $v["salary"], $v["country"], $v["last_date"],
                        $v["job_type"], $v["job_category"], $v["time_type"], $v["image"], $v["created_at"])
                );
            }
        }

        return [
            'data' => $arr,
            'total' => $total
        ];
    }

    public static function getByStaffId($staffId)
    {
        $db = Db::GetInstance();

        $sql = "
				select 	j.id as id,
						j.staff_id as staff_id,
						j.title as title,
						j.description as description,
						j.content as content,
						j.salary as salary,
						j.country as country,
						j.last_date as last_date,
						jt.name as job_type,
						j.job_category as job_category,
						j.time_type as time_type,
						j.image as image,
						j.created_at as created_at
				from job as j 
				INNER JOIN job_type as jt 
                ON j.job_type = jt.id 
				where j.staff_id = {$staffId} 
			";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll();

        $arr = [];
        if (count($rs) > 0) {
            foreach ($rs as $v) {
                array_push($arr,
                    new JobModel($v["id"], $v["staff_id"], $v["title"], $v["description"], $v["content"], $v["salary"], $v["country"], $v["last_date"],
                        $v["job_type"], $v["job_category"], $v["time_type"], $v["image"], $v["created_at"])
                );
            }
        }

        return $arr;
    }

    /**
     * Get student apply job
     *
     * @param null $jobType
     * @param null $country
     * @param int $currentPage
     * @param int $limit
     * @return array
     */
    public static function studentsApplyJob($jobType = null, $country = null, $currentPage = 1, $limit = 3)
    {
        $db = Db::GetInstance();
        $staffId = $_SESSION['staff_id'];

        $sqlTotal = "
				select sj.id 
				from student_job as sj 
				INNER JOIN job as j 
                ON sj.job_id = j.id 
                INNER JOIN student as st 
                ON st.id = sj.student_id 
				where j.staff_id = {$staffId} and sj.status_approve = 0 
			";

        $positionStart = ($currentPage - 1) * $limit;

        $sql = "
				select st.first_name as first_name,
				    st.last_name as last_name,
				    st.experience as experience,
				    st.work_in_australia as work_in_australia,
				    sj.id as id,
				    sj.cover_letter as cover_letter,
				    st.resume as resume,
				    j.title as title
				from student_job as sj 
				INNER JOIN job as j 
                ON sj.job_id = j.id 
                INNER JOIN student as st 
                ON st.id = sj.student_id 
				where j.staff_id = {$staffId} and sj.status_approve = 0 
			";

        if (!empty($jobType)) {
            $sql .= "and j.job_type in ({$jobType}) ";
            $sqlTotal .= "and j.job_type in ({$jobType}) ";
        }

        if (!empty($country)) {
            $sql .= "and j.country like '%{$country}%' ";
            $sqlTotal .= "and j.country like '%{$country}%' ";
        }

        $sql .= "limit {$positionStart}, {$limit} ";

        $stmt = $db->prepare($sql);
        $stmtTotal = $db->prepare($sqlTotal);

        $stmt->execute();
        $rs = $stmt->fetchAll();

        $stmtTotal->execute();
        $total = $stmtTotal->rowCount();
        $total = ceil($total / $limit);

        return [
            'data' => $rs,
            'total' => $total
        ];
    }

    public static function getDetail($id)
    {
        $db = Db::GetInstance();

        $sql = "
				select 	j.id as id,
						j.staff_id as staff_id,
						j.title as title,
						j.description as description,
						j.content as content,
						j.salary as salary,
						j.country as country,
						j.last_date as last_date,
						j.job_type as job_type,
						j.job_category as job_category,
						j.time_type as time_type,
						j.image as image,
						j.created_at as created_at
				from job as j 
				where j.id = {$id} 
			";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetch();

        $result = null;
        if ($rs) {
            $result = new JobModel($rs["id"], $rs["staff_id"], $rs["title"], $rs["description"], $rs["content"], $rs["salary"], $rs["country"], $rs["last_date"],
                $rs["job_type"], $rs["job_category"], $rs["time_type"], $rs["image"], $rs["created_at"]);
        }

        return $result;
    }

    /**
     * short list then status approve is 1
     *
     * @param $id
     * @return bool
     */
    public static function shortList($id)
    {
        $db = Db::GetInstance();

        $stmt = $db->prepare("
				update 	student_job 
				set 	status_approve 		= 1 
				where 	id 			= :id
			");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    /**
     * short list then status approve is 2
     *
     * @param $id
     * @return bool
     */
    public static function notSuitable($id)
    {
        $db = Db::GetInstance();

        $stmt = $db->prepare("
				update 	student_job 
				set 	status_approve 		= 2 
				where 	id 			= :id
			");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public static function checkStudentApplyJob($jobId)
    {
        $db = Db::GetInstance();
        $stmt = $db->prepare("
				select 	sj.id as id 
				from student_job as sj
				where sj.job_id = :job_id and sj.student_id = :student_id 
			");

        $stmt->bindParam(':job_id', $jobId, PDO::PARAM_INT);
        $stmt->bindParam(':student_id', $_SESSION['student_id'], PDO::PARAM_INT);
        $stmt->execute();
        $rs = $stmt->rowCount();

        return $rs;
    }

    public static function applyJobByStudent($data)
    {
        $day = date("Y-m-d");
        $db = Db::GetInstance();
        $data['job_id'] = (int) $data['job_id'];
        $status = 0;

        if (!self::checkStudentApplyJob($data['job_id'])) {
            $stmt = $db->prepare("
				insert into student_job
					(student_id, job_id, status_approve, resume, cover_letter, selection_criteria, date_apply)
				values
					(:student_id, :job_id, :status_approve, :resume ,:cover_letter ,:selection_criteria , :date_apply)
			");
            $stmt->bindParam(':student_id', $_SESSION['student_id'], PDO::PARAM_INT);
            $stmt->bindParam(':job_id', $data['job_id'], PDO::PARAM_INT);
            $stmt->bindParam(':status_approve', $status, PDO::PARAM_INT);
            $stmt->bindParam(':resume', $data['resume'], PDO::PARAM_STR);
            $stmt->bindParam(':cover_letter', $data['cover_letter'], PDO::PARAM_STR);
            $stmt->bindParam(':selection_criteria', $data['selection_criteria'], PDO::PARAM_STR);
            $stmt->bindParam(':date_apply', $day, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }

    public static function addJob($data)
    {
        $day = date("Y-m-d");
        $lastDay = date('Y-m-d', strtotime($day. ' + 30 days'));
        $db = Db::GetInstance();

        $stmt = $db->prepare("
            insert into job
                (staff_id, title, description, salary, country, last_date, job_type, job_category, time_type, created_at)
            values
                (:staff_id, :title, :description, :salary ,:country ,:last_date , :job_type, :job_category, :time_type, :created_at)
        ");
        $stmt->bindParam(':staff_id', $_SESSION['staff_id'], PDO::PARAM_INT);
        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindParam(':salary', $data['salary'], PDO::PARAM_STR);
        $stmt->bindParam(':country', $data['country'], PDO::PARAM_STR);
        $stmt->bindParam(':last_date', $lastDay, PDO::PARAM_STR);
        $stmt->bindParam(':job_type', $data['job_type'], PDO::PARAM_INT);
        $stmt->bindParam(':job_category', $data['job_category'], PDO::PARAM_INT);
        $stmt->bindParam(':time_type', $data['time_type'], PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $day, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

    public static function editJob($data)
    {
        $db = Db::GetInstance();

        $stmt = $db->prepare("
				update 	job 
				set 	staff_id 		= :staff_id,
				        title           = :title,
				        description     = :description,
				        salary     = :salary,
				        country     = :country,
				        job_type     = :job_type,
				        job_category     = :job_category,
				        time_type     = :time_type 
				where 	id 			= :id
			");

        $stmt->bindParam(':staff_id', $_SESSION['staff_id'], PDO::PARAM_INT);
        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindParam(':salary', $data['salary'], PDO::PARAM_STR);
        $stmt->bindParam(':country', $data['country'], PDO::PARAM_STR);
        $stmt->bindParam(':job_type', $data['job_type'], PDO::PARAM_INT);
        $stmt->bindParam(':job_category', $data['job_category'], PDO::PARAM_INT);
        $stmt->bindParam(':time_type', $data['time_type'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public static function removeJob($id)
    {
        $db = Db::GetInstance();

        $stmt = $db->prepare("
				delete from job 
				where 	id 			= :id
			");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt2 = $db->prepare("
				delete from student_job  
				where 	job_id 			= :id
			");
        $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt2->execute();

        return true;
    }
}

?>