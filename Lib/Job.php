<?PHP
  namespace App\Lib;
  use App\Lib\Database;
  class Job{
    private $db;
    public function __construct(){
      $this->db = new Database;
    }
    
    //get All Jobs with this method : 
    public function getAllJobs(){
      $this->db->query("SELECT jobs.*, categories.name AS cname FROM jobs INNER JOIN categories ON jobs.category_id = categories.id ORDER BY post_date DESC");

      //Assign Result set : 
      $results = $this->db->resultSet();

      return $results;
    }
    
    public function getCategories(){
      $this->db->query("select * from categories");
      $results = $this->db->resultSet();
      return $results;
    }

    //gettin jobs by category:
    public function getByCategory($category){
      $this->db->query("SELECT jobs.*, categories.name AS cname 
                        FROM jobs INNER JOIN categories 
                        ON jobs.category_id = categories.id 
                        WHERE jobs.category_id = $category 
                        ORDER BY post_date DESC
                      ");

      //Assign Result set : 
      $results = $this->db->resultSet();

      return $results;
    }

    //get a specified category
    public function getCategory($category_id){
      $this->db->query("SELECT * FROM categories WHERE id = :category_id");
      $this->db->bind(':category_id',$category_id);

      //Assigning a row:
      $row = $this->db->single();
      return $row;
    }
    
    //get a job for the job file:
    public function getJob($id){
      $this->db->query("SELECT * FROM jobs WHERE id = :id");
      $this->db->bind(':id',$id);

      //Assigning a row:
      $row = $this->db->single();
      return $row;
    }

    //Creating a job:
    public function create($data){
      //Insert Query
      $this->db->query("INSERT INTO jobs(category_id,job_title,company,description,location,salary,contact_user,contact_email)
                        VALUES(:category_id, :job_title, :company, :description, :location, :salary, :contact_user, :contact_email)
                      ");
      //Bind data
      $this->db->bind(':category_id',$data['category_id']);
      $this->db->bind(':job_title',$data['job_title']);
      $this->db->bind(':company',$data['company']);
      $this->db->bind(':description',$data['description']);
      $this->db->bind(':location',$data['location']);
      $this->db->bind(':salary',$data['salary']);
      $this->db->bind(':contact_user',$data['contact_user']);
      $this->db->bind(':contact_email',$data['contact_email']);

      return $this->db->execute()?true:false;
    }


    //updating the data of a job:
    public function update($job_id,$data){
      //Insert Query
      $this->db->query("UPDATE jobs
                        SET 
                          category_id = :category_id,
                          job_title = :job_title,
                          company = :company,
                          description = :description,
                          location = :location,
                          salary = :salary,
                          contact_user = :contact_user,
                          contact_email = :contact_email 
                        WHERE id=$job_id
                       ");

      //Bind data
      $this->db->bind(':category_id',$data['category_id']);
      $this->db->bind(':job_title',$data['job_title']);
      $this->db->bind(':company',$data['company']);
      $this->db->bind(':description',$data['description']);
      $this->db->bind(':location',$data['location']);
      $this->db->bind(':salary',$data['salary']);
      $this->db->bind(':contact_user',$data['contact_user']);
      $this->db->bind(':contact_email',$data['contact_email']);

      return $this->db->execute()?true:false;
    }


    //Delete a job
    public function delete($id){      
      //Insert Query
      $this->db->query("DELETE FROM JOBS WHERE id=$id");
      //Bind data
      return $this->db->execute()?true:false;
    }
  }
?>