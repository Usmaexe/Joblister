<?PHP
  echo "
    <div class='page-header'>
      <h2>$job->job_title in $job->location.</h2>
      <small>Posted by : <b>$job->contact_user</b> on <i>$job->post_date</i></small><br>
      <p class='lead'>$job->description</p>
      <ul class='list-group'>
        <li class='list-group-item'> <strong>Company : </strong> $job->company </li>
        <li class='list-group-item'> <strong>Salary : </strong> $job->salary </li>
        <li class='list-group-item'> <strong>Contact Email : </strong> $job->contact_email </li>
      </ul>
      <BR>
      <div class='well'>
      <a class='btn btn-success' href='../../index.php'>Return</a>
        <a href='edit.php?id=$job->id' class='btn btn-default'>Edit</a>
        <form action='job.php' method='post' style='display:inline'>
          <input type='hidden' name='del_id' value='$job->id'>
          <input type='submit' value='Delete' class='btn btn-danger'>
        </form>
      </div>
    </div>

  ";
?>
