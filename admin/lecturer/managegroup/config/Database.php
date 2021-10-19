<?php
    //This is an object for the database that only focuses on the database
    //attributes such as database name and username
    class Database
    {

        //Database parameters
        //===================
        //These are all the attributes that are required to log into the database
        private $host = "localhost";
        private $db_name = "grouping_system";
        private $username = "root";
        private $password = "";

        //Connect to database
        public function connect()  
        {
            $this->conn = null;//Why is this set to null, we have set this to null in that we want to populate with something later but we do not want to populate it with a string or anything of that nature so for now we just simply set it to null
            try
            {
                $this->conn = new PDO("mysql:host=" . $this->host . "; dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
                echo "Connection Error: " . $e->getMessage();
            }
            return $this->conn;
            
        }

    }
    // STATIC CLSS MEMBERS
    // As each class object is created, it gets its own block of memory for it's data member, in some cases, in some cases, however, it's convenient for every created object to share the saame memory location for a specific variable (at this point do we call this a variable or data member?)
    // Static class variable share the same space for all class objects - in this way they act as global variables for the class * rpovide a means of communication  between objects
    
    // The 'this' pointer
    // The 'this' pointer is added automatically to each non-static class method as a hiddedn argument. 
    // When a method is called the calling object's address is passed to it & stored in the method's 'this' pointer therefore, each member method actually receives an extra argument that's the address of an object.
    
    // So I jump an essential step -- but so far the 'this' pointer is important in helping us share methods, remember that during a class definition methods are creates as well as data member - now when a new object is created the objects gets assigned a memory location tis is true for the object's data member - But what about the member methods - Do they also get assigned a memory location for each object created or are they shared?
    // If they are shared then every method needs to know its user hence now refering to the 'this' pointer we learn that the 'this' pointer is added automatically to teach nonstatic class method as a hidden argument, when a method is called the calling object's address is passed to it and stored in the method's 'this' pointer.
    
    // Each time an object is createde fom  a class, a distinct area of memory is set aside for its data member foe example, oif tow objects named 'a' and 'b' are created from the data class, the memory storage for each set of data member has its own starting address in memory which corresponds to the address of the object's first data member this replication of data storage isn't implemnted for member methods in fact for each class, only one copy of the member methods is retained in memory, and each object uses these same methods.
?>