<?php 
include_once 'config/init.php';
 ?>

<?php
$job = new Job();
if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];
    if($job->delete($del_id)){
        redirect("index.php",'Job Deleted','success');
    }else{
        redirect('index.php','Job Not Deleted','error' );
    }
}

$template = new Template('templates/job-single.php');        //Template() connects with template file..and access things.
$job_id = isset($_GET['id']) ? $_GET['id'] : null;           // if theres category in URL, set category to it..if not NULL.


// $template->title = "Latest Jobs";
// $template->jobs = $job->getAllJobs();
$template->job = $job->getJob($job_id);

echo($template);