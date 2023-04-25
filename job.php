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
  
  //Creating object that'll be used : 
  $job = new Job;
  $job_id = isset($_GET['id']) ? $_GET['id'] : 1;
  if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];
    if($job->delete($del_id)){
      redirect('index.php','Job deleted','success');
    }
    else{
      redirect('index.php','Job Not deleted','error');
    }
  }

  $template = new Template('Templates/job-single.php');
  $template->job = $job->getJob($job_id);
  // var_dump($job);
  //printing the content of the page
  echo $template;
?>
  