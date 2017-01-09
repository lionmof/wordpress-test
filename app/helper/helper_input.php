<?php

class Input {

    static function validate($array) {
        
        $placeholders = array('username', 'email', 'comment', 'captcha'); 
        
        //проверка существуют ли вообще такие поля
        
        foreach ($placeholders as $placeholder) {
            
            if (!isset($array[$placeholder])){
                
                return false;
            }
            else{
                $array[$placeholder] = strip_tags($array[$placeholder]);
            }
            
        }
        
        //
        
        
        if (    md5($array['captcha']) != $_SESSION['captcha'] ||
                !self::is_email($array['email']) ||
                !self::is_login($array['username'] ||
                strlen ($array['comment']) < 3        )
                        
                        
                        ){
            
            
            return false;
        }
        
        
        return $array;
        
    }
    
    static function is_email($email) {    
        return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email);
    }
    
    
    static function is_login($login){
        return preg_match('|^[A-Z0-9]+$|i', $login);
    
    }
    
}
