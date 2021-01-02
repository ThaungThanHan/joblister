<?php
    class Job{
        private $db;

        public function __construct(){
            $this->db = new Database;   // this is database.php what we created
        }
        public function getAllJobs(){
            $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories
             ON jobs.category_id = categories.id ORDER BY post_date DESC " );
            
            //Assign result set
            $results = $this->db->resultSet();
            return $results;
        }

        //Get Categories
        public function getCategories(){            // all categories for displaying cateogry list.
            $this->db->query("SELECT * FROM categories" );
            
            //Assign result set
            $results = $this->db->resultSet();
            return $results;
        }
        public function getByCategory($category){               // fetching category data with category_id. Category_id thu tae jobs tway u tar pl.
            $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories
            ON jobs.category_id = categories.id WHERE jobs.category_id = $category ORDER BY post_date DESC " ); //jobs.category_id = $category which is in the url
            //http://localhost:8080/joblister/index.php?category=1
           
           //Assign result set
           $results = $this->db->resultSet();
           return $results;
        }
        public function getCategory($category_id){              // category data tone pee category u tar.
            $this->db->query("SELECT * FROM categories WHERE id = :category_id");    // :category_id is a placeholder. We have to bind it later.
            $this->db->bind(':category_id',$category_id);
            
            $row = $this->db->single();
            return $row;
        }
        
        public function getJob($job_id){            // for single job page
            $this->db->query("SELECT * FROM jobs WHERE id = :id");    // :category_id is a placeholder. We have to bind it later.
            $this->db->bind(':id',$job_id);
            
            $row = $this->db->single();
            return $row;
        }

        public function create($data){
            //Insert Query
            $this->db->query("INSERT INTO jobs (category_id,job_title,company,description,location,salary,contact_user,contact_email)
                                VALUES (:category_id,:job_title,:company,:description,:location,:salary,:contact_user,:contact_email)"); //insert into jobs () values ()
            // BIND DATA
            $this->db->bind(':category_id',$data['category_id']);   // data array htl ka ny pyn swel htoke
            $this->db->bind(':job_title',$data['job_title']);
            $this->db->bind(':company',$data['company']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':location',$data['location']);
            $this->db->bind(':salary',$data['salary']);
            $this->db->bind(':contact_user',$data['contact_user']);
            $this->db->bind(':contact_email',$data['contact_email']);
            
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function delete($id){        // DELETE from jobs WHERE id =$id
            $this->db->query("DELETE FROM jobs WHERE id = $id");

            //Execute
            if($this->db->execute()){
            return true;
            }else{
            return false;
            }
        }
        public function update($id,$data){
            //Insert Query.. // UPDATE jobs SET ... WHERE id = $id
            $this->db->query("UPDATE jobs SET                   
                            category_id = :category_id,
                            job_title = :job_title,
                            company = :company,
                            description = :description,
                            location = :location,
                            salary = :salary,
                            contact_user = :contact_user,
                            contact_email = :contact_email
                            WHERE id = $id");
            // BIND DATA
            $this->db->bind(':category_id',$data['category_id']);
            $this->db->bind(':job_title',$data['job_title']);
            $this->db->bind(':company',$data['company']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':location',$data['location']);
            $this->db->bind(':salary',$data['salary']);
            $this->db->bind(':contact_user',$data['contact_user']);
            $this->db->bind(':contact_email',$data['contact_email']);
            
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

    }