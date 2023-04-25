<div class="page-header">
  <h2 style="margin-bottom:1.5em;">Edit Job Listing</h2>
  <form method = "post" action="../../edit.php?id=<?PHP echo $job->id;?>">
    <div class="form-group">
      <label class="createFormLabel">Company</label>
      <input type="text" class="form-control create-form-control " name="company" value="<?PHP echo $job->company;?>">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Category</label>
      <?PHP
      echo'
        <select name="category" class="form-control" style="display: inline-block;width: 86%;">
                // if($job->category_id==$categr)
                <option value="0">Choose Category</option>';
                foreach($categories as $category) :
                  echo'<option value="'.$category->id.'">'.$category->name.'</option>';
                endforeach;
                echo '
        </select>';
      ?>
    </div>
    <div class="form-group">
      <label class="createFormLabel">Job Title</label>
      <input type="text" class="form-control create-form-control " name="job_title" value="<?PHP echo $job->job_title;?>">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Description</label>
      <textarea type="text" class="form-control create-form-control " name="description"><?PHP echo $job->description;?></textarea>
    </div>
    <div class="form-group">
      <label class="createFormLabel">Location</label>
      <input type="text" class="form-control create-form-control " value="<?PHP echo $job->location;?>" name="location">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Salary</label>
      <input type="text" class="form-control create-form-control " value="<?PHP echo $job->salary;?>" name="salary">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Contact User</label>
      <input type="text" class="form-control create-form-control " value="<?PHP echo $job->contact_user;?>" name="contact_user">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Contact Email</label>
      <input type="text" class="form-control create-form-control " name="contact_email" value="<?PHP echo $job->contact_email;?>">
      <input type="submit" class="btn btn-warning" value="Submit" name="submit">
    </div>
  </form>
</div>