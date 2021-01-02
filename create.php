<?php 
include_once 'config/init.php';
 ?>

<?php
$job = new Job();

if (isset($_POST['submit'])){           // job-create.php mr Form ka ny POST method nae submit lite lo..shi tamya input twy akone access ya.
    //create Data Array.. Putting user input to an array that is going to the database
    $data = array();
    $data['job_title'] = $_POST['job_title'];               // assigning each input as an item in an array
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    if($job->create($data)){
        redirect('index.php',"Your job has been listed!","success");      
    }else{
        redirect('index.php',"Something went wrong","error");      

    }
}else{

}

$template = new Template('templates/job-create.php');        //Template() connects with template file..and access things.

// $template->title = "Latest Jobs";
// $template->jobs = $job->getAllJobs();
$template->categories = $job->getCategories();

echo($template);