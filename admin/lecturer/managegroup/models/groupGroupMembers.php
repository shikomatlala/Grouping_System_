<?php
    //Fine we want to post all groups - but how do we make sure that we can post the relevant groups, I am thinking to myself how do we know that we right group?
    //Now that is the question how can we interact with api?
    //Can we create a condition so that when the api responds to us it gives us data that meets our condition?

    class Post 
    {
        //DB Connections
        private $conn;
        private $table = "posts";
        //Post properties
        //Yes we want to display all groups but under what condition?
        //But for now let us remember that our groups are shared - but here again becomes an important we might need groups from last semester so these groups should be able to communicat

        //Database table fields that will be posted by this api
        private $group_id;
        private $group_name;
        private $group_member_id;
        private $member_mark;
        private $stud_number;
        private $lecture_group_id;
        //Why don't we add a year to these groups?
        //Since we know the lectureg_group_id we can use this to filter out what groups the person can see.

        public function __construct($db)
        {
            //$db is the database object that is passed to this function
            $this->conn = $db;
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