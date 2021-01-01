<?php include 'inc/header.php'?>    
    <h2 class="page-header">Post Job</h2>
    <form method="POST" action="create.php">
        <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control" name="company"/>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
            <?php foreach($categories as $category): ?>
              <option value="<?php echo $category->id; ?>"><?php echo $category->name;  ?></option>  <!-- like in javascript, {category.id} jsx asrr.. php echo $category->id; lote tr-->
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title"/>
        </div>
        <div class="form-group">
            <label>Job Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label>Location</label>
            <textarea class="form-control" name="location"></textarea>
        </div>
        <div class="form-group">
            <label>Salary</label>
            <textarea class="form-control" name="salary"></textarea>
        </div>
        <div class="form-group">
            <label>Contact User</label>
            <input type="text" class="form-control" name="contact_user"/>
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="text" class="form-control" name="contact_email"/>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit"/>
    </form>
    <br/>
<?php include 'inc/footer.php' ?>