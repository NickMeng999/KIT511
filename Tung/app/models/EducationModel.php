<?php

/**
 *
 */
class EducationModel
{
    public $id;
    public $student_id;
    public $school;
    public $degree;
    public $field_of_study;
    public $grade;
    public $start_year;
    public $end_year;

    function __construct($id = null,
                         $student_id = null,
                         $school = null,
                         $degree = null,
                         $field_of_study = null,
                         $grade = null,
                         $start_year = null,
                         $end_year = null)
    {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->school = $school;
        $this->degree = $degree;
        $this->field_of_study = $field_of_study;
        $this->grade = $grade;
        $this->start_year = $start_year;
        $this->end_year = $end_year;
    }

    /**
     *
     */
    public static function checkEducationStudent($studentId)
    {
        $db = Db::GetInstance();
        $stmt = $db->prepare("
				select 	ed.id as id 
				from education as ed
				where ed.student_id = :id
			");

        $stmt->bindParam(':id', $studentId, PDO::PARAM_INT);
        $stmt->execute();
        $rs = $stmt->rowCount();

        return $rs;
    }

    public static function getByStudent($studentId)
    {
        $db = Db::GetInstance();

        $stmt = $db->prepare("
				select 	ed.id as id,
				        ed.student_id as student_id,
				        ed.school as school,
						ed.degree as degree,
						ed.field_of_study as field_of_study,
						ed.grade as grade,
						ed.start_year as start_year,
						ed.end_year as end_year 
				from education as ed 
				where ed.student_id = :id 
			");

        $stmt->bindParam(':id', $studentId, PDO::PARAM_INT);
        $stmt->execute();
        $rs = $stmt->fetch();
        if ($rs) {
            $result = new EducationModel($rs["id"], $rs["student_id"], $rs["school"], $rs["degree"], $rs["field_of_study"], $rs["grade"], $rs["start_year"], $rs["end_year"]);
        } else {
            $result = null;
        }

        return $result;
    }

    public static function changeEducation($data)
    {
        $db = Db::GetInstance();
        if (!self::checkEducationStudent($_SESSION['student_id'])) {
            $stmt = $db->prepare("
				insert into education
					(student_id, school, degree, field_of_study, grade, start_year, end_year)
				values
					(:student_id, :school, :degree, :field_of_study ,:grade ,:start_year ,:end_year)
			");
            $stmt->bindParam(':student_id', $_SESSION['student_id'], PDO::PARAM_INT);
        } else {
            $stmt = $db->prepare("
				update 	education
				set 	school 		= :school, 
						degree 		= :degree, 
						field_of_study     = :field_of_study,
						grade 		= :grade, 
						start_year = :start_year,
						end_year 		= :end_year
				where 	student_id 			= :id
			");
            $stmt->bindParam(':id', $_SESSION['student_id'], PDO::PARAM_INT);
        }
        $stmt->bindParam(':school', $data['school'], PDO::PARAM_STR);
        $stmt->bindParam(':degree', $data['degree'], PDO::PARAM_STR);
        $stmt->bindParam(':field_of_study', $data['field_of_study'], PDO::PARAM_STR);
        $stmt->bindParam(':grade', $data['grade'], PDO::PARAM_INT);
        $stmt->bindParam(':start_year', $data['start_year'], PDO::PARAM_INT);
        $stmt->bindParam(':end_year', $data['end_year'], PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    public static function remove()
    {
        $id = $_SESSION['student_id'];
        $db = Db::GetInstance();
        if (self::checkEducationStudent($id)) {
            $stmt = $db->prepare("DELETE FROM education WHERE student_id = {$id}");
            $stmt->execute();
        }

        return true;
    }
}

?>