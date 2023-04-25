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
  $template = new Template('Templates/frontpage.php');

  $job = new Job;
  $template->jobs = $job->getAllJobs(); 
  $category = isset($_GET['category'])? $_GET['category']:null;
  if($category){
    $template->jobs = $job->getByCategory($category);
    $template->title = 'Jobs In '.$job->getCategory($category)->name;
  }
  else{
    $template->title = 'Latest Jobs';
  }

  $template->categories = $job->getCategories();
  echo '<HEAD><TITLE>Joblister - Home</TITLE>';  
  echo $template;
?>