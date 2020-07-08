<?php
namespace Core;
class Error{
    public static function errorHandler($level,$msg,$file,$line){
    if(error_reporting()!==0){
        throw new \ErrorException($msg,0,$level,$file,$line);

    }
    }

    public static function exceptionHandler($exception){
        $code=$exception->getCode();
        if($code!=404){
            $code=500;
        }
        http_response_code($code);
        if(\App\Config::SHOW_ERRORS){
        echo "<h1>Fatal error</h1>";
        echo "<p>Uncaught exception: '".get_class($exception)."'</p>";
        echo "<p>Message: '".$exception->getMessage()."'</p>";
        echo "<p>Stack Trace:<pre>".$exception->getTraceAsString()."</pre></p>";
        echo "<p>Thrown in '".$exception->getFile()."' on Line ".
        $exception->getLine()."</p>";
        }else{
            $log=dirname(__DIR__).'/logs/'.date('Y-m-d').'.txt';
            ini_set('error_log',$log);
            $msg = "Uncaught exception: '".get_class($exception)."'";
            $msg .="Message: '".$exception->getMessage()."'";
            $msg .="\nStack Trace: ".$exception->getTraceAsString();
            $msg .="\nThrown in '".$exception->getFile()."' on Line ".
            $exception->getLine();
            error_log($msg);
            // if($code==404){
            //     echo "<h1>Page not found</h1>" ;
            // }else{
            // echo "<h1>An error occured</h1>";
         //} 
         View::renderTemplate("$code.html");
        }  
    }
}