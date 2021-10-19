<?php
    class Post 
    {
        //DB Connection
        private $conn;

        //This is our constructor
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function deleteAGroup($groupId)
        {

            $sql = "DELETE 
            FROM `group_member`
            WHERE `group_member`.group_id =" . $groupId;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $sql ="DELETE 
            FROM `group`
            WHERE `group`.group_id =" . $groupId;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
    }
?>