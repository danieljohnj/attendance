<?php


    class crud{
        //private datebase object
                private $db;

                //coonstructor to initialize private variable to the database connection
                function __construct($conn){
                    $this->db = $conn;

                    }

                public function insert($fname, $lname, $dob, $email, $contact, $specialty){

                    try {
                        //define sql statement to be executed
                        $sql ="INSERT INTO attendee (firstname, lastname, dateofbirth, email, contactnumber, specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
                        //bind all placeholders to the actual values
                        $stmt = $this->db->prepare($sql);
                        //binds all placeholder to the actual value
                        $stmt->bindparam(':fname' ,$fname);
                        $stmt->bindparam(':lname' ,$lname);
                        $stmt->bindparam(':dob' ,$dob);
                        $stmt->bindparam(':email' ,$email);
                        $stmt->bindparam(':contact' ,$contact);
                        $stmt->bindparam(':specialty' ,$specialty);
                        //execute statement
                        $stmt->execute();
                        return true;
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }
                }
                //check why all records are updated
                public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty){
                        try{
                                $sql = "UPDATE `attendee` SET `firstname`= :fname,`lastname`= :lname,`dateofbirth`= :dob,`email`= :email,`contactnumber`= :contact,`specialty_id`= :specialty WHERE :id";
                                $stmt = $this->db->prepare($sql);
                                //binds all placeholder to the actual value
                                $stmt->bindparam(':id' ,$id);                          
                                $stmt->bindparam(':fname' ,$fname);
                                $stmt->bindparam(':lname' ,$lname);
                                $stmt->bindparam(':dob' ,$dob);
                                $stmt->bindparam(':email' ,$email);
                                $stmt->bindparam(':contact' ,$contact);
                                $stmt->bindparam(':specialty' ,$specialty);
                                //execute statement
                                $stmt->execute();
                                return true;

                    }catch(PDOException $e) {
                        echo $e->getMessage();
                        return false;

                    }
                }
                   

                public function getAttendees(){
                    try{
                        $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id ";
                        $result = $this->db->query($sql);
                        return $result;

                    }catch(PDOException $e) {
                        echo $e->getMessage();
                        return false;

                    }
                        
                        

                }

                
                

                public function getAttendeeDetails($id){
                   try{
                        $sql = "SELECT * FROM attendee  a inner join specialties s on a.specialty_id = s.specialty_id   where attendee_id = :id";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindparam(':id', $id);
                        $stmt->execute();
                        $result = $stmt->fetch();
                        return $result;

                    }catch(PDOException $e) {
                        echo $e->getMessage();
                        return false;

                    }
                    
                }

                public function deleteAttendee($id){
                    try{

                
                        $sql = "delete from attendee where attendee_id = :id ";
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindparam(':id', $id);
                        $stmt->execute();
                        return true;
                
                    
                    }catch(PDOException $e) {
                        echo $e->getMessage();
                        return false;

                    }

                }

                public function getSpecialties(){
                    try{
                        $sql = "SELECT * FROM `specialties`";
                        $result = $this->db->query($sql);
                        return $result;

                    }catch(PDOException $e) {
                        echo $e->getMessage();
                        return false;

                    }

                }

                
            }

?>