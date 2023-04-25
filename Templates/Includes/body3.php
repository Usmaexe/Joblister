<div class="page-header">
  <h2 style="margin-bottom:1.5em;">Create Job Listing</h2>
  <form method = "post" action="../../create.php">
    <div class="form-group">
      <label class="createFormLabel">Company</label>
      <input type="text" class="form-control create-form-control " name="company">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Category</label>
      <?PHP
      echo'
        <select name="category" class="form-control" style="display: inline-block;width: 86%;">
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
      <input type="text" class="form-control create-form-control " name="job_title">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Description</label>
      <textarea type="text" class="form-control create-form-control " name="description"></textarea>
    </div>
    <div class="form-group">
      <label class="createFormLabel">Location</label>
      <input type="text" class="form-control create-form-control " name="location">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Salary</label>
      <input type="text" class="form-control create-form-control " name="salary">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Contact User</label>
      <input type="text" class="form-control create-form-control " name="contact_user">
    </div>
    <div class="form-group">
      <label class="createFormLabel">Contact Email</label>
      <input type="text" class="form-control create-form-control " name="contact_email">
      <input type="submit" class="btn btn-warning" value="Submit" name="submit">
    </div>
  </form>
</div>