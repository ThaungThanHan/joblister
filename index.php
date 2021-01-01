<?php 
include_once 'config/init.php';
 ?>

<?php
$job = new Job();
$template = new Template('templates/frontpage.php');        //Template() connects with template file..and access things.
$category = isset($_GET['category']) ? $_GET['category'] : null;           // if theres category in URL, set category to it..if not NULL.

if($category){
    $template->jobs = $job->getByCategory($category);
    $template->title = "Jobs in ".$job->getCategory($category)->name;
}else{
    $template->title="Latest Jobs";
    $template->jobs = $job->getAllJobs();
}


// $template->title = "Latest Jobs";
// $template->jobs = $job->getAllJobs();
$template->categories = $job->getCategories();

echo($template);