<?php

/**
 *
 */
class JobTypeModel
{
    public $id;
    public $name;
    public $created_at;

    function __construct($id = null,
                         $name = null,
                         $created_at = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
    }

    /**
     * Get All job type
     *
     * @return array
     */
    public static function getAll()
    {
        $db = Db::GetInstance();

        $sql = "
				select 	j.id as id,
						j.name as name,
						j.created_at as created_at
				from job_type as j 
			";

        $stmt = $db->prepare($sql);

        $stmt->execute();
        $rs = $stmt->fetchAll();

        $arr = [];
        if (count($rs) > 0) {
            foreach ($rs as $v) {
                array_push($arr,
                    new JobTypeModel($v["id"], $v["name"], $v["created_at"])
                );
            }
        }

        return $arr;
    }
}

?>