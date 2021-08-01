<?php

/**
 *
 */
class JobModel
{
    public $id;
    public $staff_id;
    public $title;
    public $content;
    public $salary;
    public $country;
    public $last_date;
    public $job_type;
    public $job_category;
    public $time_type;
    public $created_at;

    function __construct($id = null,
                         $staff_id = null,
                         $title = null,
                         $content = null,
                         $salary = null,
                         $country = null,
                         $last_date = null,
                         $job_type = null,
                         $job_category = null,
                         $time_type = null,
                         $created_at = null)
    {
        $this->id = $id;
        $this->staff_id = $staff_id;
        $this->title = $title;
        $this->content = $content;
        $this->salary = $salary;
        $this->country = $country;
        $this->last_date = $last_date;
        $this->job_type = $job_type;
        $this->job_category = $job_category;
        $this->time_type = $time_type;
        $this->created_at = $created_at;
    }

    public static function getByJobType($jobType = null)
    {
        $db = Db::GetInstance();

        $sql = "
				select 	j.id as id,
						j.staff_id as staff_id,
						j.title as title,
						j.content as content,
						j.salary as salary,
						j.country as country,
						j.last_date as last_date,
						j.job_type as job_type,
						j.job_category as job_category,
						j.time_type as time_type,
						j.created_at as created_at
				from job as j 
			";

        if (!empty($jobType)) {
            $sql .= "where j.job_type = :job_type";
        }

        $stmt = $db->prepare($sql);

        if (!empty($jobType)) {
            $stmt->bindParam(':job_type', $jobType, PDO::PARAM_INT);
        }

        $stmt->execute();
        $rs = $stmt->fetchAll();

        $arr = [];
        if (count($rs) > 0) {
            foreach ($rs as $v) {
                array_push($arr,
                    new JobModel($v["id"], $v["staff_id"], $v["title"], $v["content"], $v["salary"], $v["country"], $v["last_date"],
                        $v["job_type"], $v["job_category"], $v["time_type"], $v["created_at"])
                );
            }
        }

        return $arr;
    }
}

?>