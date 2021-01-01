<?php include 'inc/header.php'?>    
    <h2 class="page-header">Edit Job</h2>
    <form method="POST" action="edit.php?id=<?php echo $job->id;?>">
        <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control" name="company" value="<?php echo $job->company ?>"/>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
            <?php foreach($categories as $category): ?>
            <?php if($job->category_id == $category->id) : ?>
                <option value="<?php echo $category->id; ?>" selected><?php echo $category->name;?></option>  <!-- like in javascript, {category.id} jsx asrr.. php echo $category->id; lote tr-->
            <?php else: ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->name;  ?></option>  <!-- like in javascript, {category.id} jsx asrr.. php echo $category->id; lote tr-->
            <?php endif; ?>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title" value="<?php echo $job->job_title ?>"/>
        </div>
        <div class="form-group">
            <label>Job Description</label>
            <textarea class="form-control" name="description"><?php echo $job->description ?></textarea>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input class="form-control" name="location" value="<?php echo $job->location ?>"/>
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input class="form-control" name="salary" value="<?php echo $job->salary;?>"></textarea>
        </div>
        <div class="form-group">
            <label>Contact User</label>
            <input type="text" class="form-control" name="contact_user" value="<?php echo $job->contact_user;?>"/>
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="text" class="form-control" name="contact_email" value="<?php echo $job->contact_email;?>"/>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit"/>
    </form>
    <br/>
<?php include 'inc/footer.php' ?>