<?php
    class Post 
    {
        //DB Connection
        private $conn;

        //This is our constructor
        public function __construct($db)
        {
            //$db is the database object that is passed to this function
            $this->conn = $db;
        }
        
        //Function to post a student on a condition
        public function postAStudentGroup($stud_number)
        {
            $sql = "SELECT * 
            FROM student, `group`, group_member
            WHERE student.stud_number = group_member.stud_number
            AND `group`.group_id = group_member.group_id
            AND student.stud_number =" . $stud_number;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        public function postStudentsGroups()
        {
            $sql = "SELECT * 
            FROM student, `group`, group_member
            WHERE student.stud_number = group_member.stud_number
            AND `group`.group_id = group_member.group_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;

        }

        public function postAStudent($stud_number)
        {
            $sql = "SELECT * 
            FROM student 
            WHERE stud_number =" . $stud_number;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        public function postStudents()
        {
            $sql = "SELECT * FROM student";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        public function read($group_id)
        {
            //Now what do we want to read?
            $sql = "SELECT * 
            FROM `group`, `group_member`
            WHERE `group`.group_id = `group_member`.`group_id`
            AND `group`.group_id =" . $group_id;

            $stmt = $this->conn->prepare($sql);
            //Execute the query
            $stmt->execute();
            return $stmt;
        }
    }
?>