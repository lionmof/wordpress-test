<?php 


class Action{
    
    
    private $db;


    public function __construct() {
        
        $this->db = Db::getInstance();
    }
    
    
    public function addComment($data) {
        
        // данные приходят только валидные, иначе не пройдут
        
        
        $sql = "INSERT INTO `comments`
            (
            comment,
            email,
            username,
            time_add            
                       
            ) VALUES (
            :comment, 
            :email, 
            :username, 
            " . time() . "
            )";

        $insert = array(
            'comment'  => $data['comment'],
            'email' => $data['email'],
            'username'  => $data['username']
        );

        $res = $this->db->set($sql, $insert);
        
        if ($res){
            return "success";
        }
        
    }
    
    
    public function getComments($limit = 5, $page = 1) {
        
        
        
        $order = " `time_add` DESC ";
        
        if (isset($_GET['order_time_add']) &&  $_GET['order_time_add']!= 'none'){
            
            $sort = ($_GET['order_time_add'] == "ASC")?"ASC":"DESC";
            
            $order = " `time_add` ".$sort;
        }
        if (isset($_GET['order_email']) &&  $_GET['order_email'] != 'none'){
            
            $sort = ($_GET['order_email'] == "ASC")?"ASC":"DESC";
            $order = " `email` ".$sort;
        }
        if (isset($_GET['order_username']) &&  $_GET['order_username'] != 'none'){
            
            $sort = ($_GET['order_username'] == "ASC")?"ASC":"DESC";
            $order = " `username` ".$sort;
        }
        
        
        
        
        $limit_start = (($page - 1) * $limit > 0) ? ($page - 1) * $limit : 0;

        
        
        
        $sql = "SELECT * FROM `comments`  ORDER BY ".$order . " LIMIT $limit_start, $limit";
        
        //echo $sql;

        return $this->db->select($sql);
        
        
        
    }
    
    
    public function getCountComments() {
        
        $sql = "SELECT count(*) as total FROM `comments` ";
        $res = $this->db->select_one($sql);   

        return $res['total'];   
        
    }

}
