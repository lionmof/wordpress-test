<?php 
class Pagination{
    /*
     input data
    $data = array(
        'count_all'
        'current_page'
        'limit'
        'url'
     * 
            
    )     
     */
    
    
    static function init($data){
        
        $pages = ceil($data['count_all'] / $data['limit']);
        
        $res = "";
        
        for($i = 1; $i <= $pages; $i++){
            
            if($i == $data['current_page'] ){ 
                $res .= "<b>$i</b>";
            }
            else{
                $res .= "<a href='".$data['url']."&page=$i'>$i</a>";
            }
            
        }
        
        
        return $res;
        
        
        
        
    }
}


