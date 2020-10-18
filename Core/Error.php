<?php
namespace Core;

class Error {

    /*
     * convert error to exception
     * @param int $level
     * @param string $mes
     * @param string $file
     * @param int $line
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if(error_reporting() !== 0){
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /*
     * handle exception
     * @param Exception $ex
     * @return void
     */
    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if($code != 404){
            $code = 500;
        }
        http_response_code($code);
        if(\App\Config::SHOW_ERRORS) {
            echo '<h1>Fatal error</h1>';
            echo '<p>Uncaught Exception: '.get_class($exception).'</p>';
            echo '<p>Message: '.$exception->getMessage().'</p>';
            echo '<p>Stack trace: <pre>'.$exception->getTraceAsString().'</pre></p>';
            echo '<p>Throw in '.$exception->getFile(). ' in line '.$exception->getLine().'</p>';
        } else {
            $logFile = dirname(__DIR__).'/logs/'.date('d-m-Y').'.txt';
            ini_set('error_log', $logFile);
            $message = "Uncaught Exception:  get_class($exception).";
            $message .= "Message: ".$exception->getMessage();
            $message .= "\nStack trace: ". $exception->getTraceAsString();
            $message .= "\nThrow in ". $exception->getFile()." in line ".$exception->getLine();
            error_log($message);
//            if($code == 404){
//                echo "<h1>Page not found</h1>";
//            } else {
//                echo "<h1>An error occured</h1>";
//            }
            View::renderTemplate($code.'.html');
        }

    }
}
