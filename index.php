<?php 
include_once 'config/init.php';
 ?>

<?php
$job = new Job();
$template = new Template('templates/frontpage.php');        //Template() connects with template file..and access things.
$category = isset($_GET['category']) ? $_GET['category'] : null;           // if theres category in URL, set category to it..if not NULL. $category=category_id
// $_GET['category'] get method ka ny ya tae data. $_POST['something'] POST method ka ny lat khn ya shi tae data.
if($category){
    $template->jobs = $job->getByCategory($category);   // category alite get tae function
    $template->title = "Jobs in ".$job->getCategory($category)->name;   // category_id tone pee category id taku chinn u tar single row data
}else{
    $template->title="Latest Jobs";                 // Category_id = 0 so yin ma shi loh else ko run tal.
    $template->jobs = $job->getAllJobs();
}


// $template->title = "Latest Jobs";
// $template->jobs = $job->getAllJobs();
$template->categories = $job->getCategories();

echo($template);