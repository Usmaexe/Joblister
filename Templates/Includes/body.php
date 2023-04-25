<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Find a Job right now!</h1>
        <?PHP
        echo'
          <form action = "../index.php" method = "GET">
            <select name="category" class="form-control" style="display: inline-block;width: 86%;">
              <option value="0">Choose Category</option>';
              foreach($categories as $category) :
                echo'<option value="'.$category->id.'">'.$category->name.'</option>';
              endforeach;
              echo '
            </select>
            <input type="submit" class="btn btn-lg btn-success" value = "Search" style="font-size:16px;">
            
          </form>
          ';
        ?>
        <button class="btn btn-primary btn-lg" type="button">Start your carreer right now!</button>
      </div>
    </div>
    <?PHP
    echo '
        <div class="row align-items-md-stretch">
        <h2 style="font-size:40px;font-style:bold">'.$title.'</h2>
      ';
      foreach($jobs as $job):
        echo '
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3"> 
              <h2>'.$job->job_title.'</h2>
              <p>'.$job->description.'</p>
              <a class="btn btn-outline-secondary" href="job.php?id='.$job->id.'">View</a>
            </div>
          </div>';
      endforeach;
      echo '
        </div>';
    ?>
  </div>

