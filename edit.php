<?PHP
  //to use the namespace that contain the template's class:
  use App\Lib\Job;
  use App\Lib\Template;
  include_once("./Config/config.php");
  //this file is used to include all the files needed in our application
  spl_autoload_register(function($fqcn){
      $path = str_replace(["App","\\"],[".","/"],$fqcn).".php";
      require_once($path);
  });
  
?>
<?PHP
  $job = new Job;
  $job_id = isset($_GET['id']) ? $_GET['id'] : 1;
  if(isset($_POST['submit'])){
    //Create Data Array
    $data=array();
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    if($job->update($job_id,$data)){
      redirect('index.php','Your job has been edited', 'success');
    }
    else{
      redirect('index.php','Something went wrong', 'error');
    }
  }
  $template = new Template('Templates/job-edit.php');

  $template->job = $job->getJob($job_id); 
  $template->categories = $job->getCategories();
  // var_dump($template->job);
  echo $template;
?>