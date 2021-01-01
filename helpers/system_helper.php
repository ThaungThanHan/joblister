<?php
    // REDIRECT TO PAGE
    function redirect($page=FALSE,$message=NULL,$message_type=NULL){
        if(is_string($page)){
            $location = $page;
        }else{
            $location = $_SERVER ['SCRIPT_NAME'];
        };

        //CHECK FOR Message
        if($message != NULL){
            // SET MESSAGE
            $_SESSION['message'] = $message;
        }
        //CHECK FOR TYPE
        if($message_type != NULL){
            //SET MESSAGE TYPE
            $_SESSION['message_type'] = $message_type;
        }

        //REDIRECT
        header ('location: '.$location);
        exit;
    }
    function displayMessage(){
        if(!empty($_SESSION['message'])){
            //Assign message var
            $message = $_SESSION['message'];
            if(!empty($_SESSION['message_type'])){
                // ASSIGN TYPE VAR
                $message_type = $_SESSION['message_type'];
                //create output 
                if($message_type == 'error'){
                    echo '<div class="alert alert-error">' . $message .'</div>';
                }else{
                    echo '<div class="alert alert-success">' . $message .'</div>';
                }
            }
            //Unset message
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }else{
            echo '';
        }
    }
  