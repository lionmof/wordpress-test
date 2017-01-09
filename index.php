<?php



session_start();

header("Content-Type: text/html; charset=utf-8");

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);




require_once(__DIR__."/app/action.php");
require_once(__DIR__."/app/config.php");
require_once(__DIR__."/app/helper/helper_db.php");
require_once(__DIR__."/app/helper/helper_input.php");
require_once(__DIR__."/app/helper/helper_pagination.php");



$action = new Action();

$result = "";

$data = array(
    'username' => '',
    'email' => '', 
    'comment' => ''
);

//если прислали форму, будем добавлять
if (isset($_POST['username'])){
    
    $check = Input::validate($_POST);
    
    
    
    $result = 'error';
    
    if ($check){
        
        $result = $action->addComment($check);        
        
    }
    
}



$data['order_username'] = $data['order_email'] =  'none';

$data['order_time_add'] = 'desc';

$get = "?order_time_add=desc";



if (isset($_GET['order_username'])){    
    $data['order_username'] = $_GET['order_username'];
    $get = "?order_username=".$_GET['order_username'];
}

if (isset($_GET['order_email'])){
    $data['order_email'] = $_GET['order_email'];
    $get = "?order_email=".$_GET['order_email'];
}
if (isset($_GET['order_time_add'])){
    $data['order_time_add'] = $_GET['order_time_add'];
    $get = "?order_time_add=".$_GET['order_time_add'];
}
    


        
$limit = 25;
        
$page = (isset($_GET['page']))? (int)$_GET['page'] : 1;

$comments = $action->getComments($limit, $page);

$count_comments = $action->getCountComments();

$filters = array(
        'count_all'=>$count_comments,
        'current_page' => $page,
        'limit' =>$limit,
        'url' => "/blog1/".$get
            
    ) ;

$pagination = Pagination::init($filters);

require_once(__DIR__."/app/view/comments.php");


   


