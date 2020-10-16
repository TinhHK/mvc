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
        echo '<h1>Fatal error</h1>';
        echo '<p>Uncaught Exception: '.get_class($exception).'</p>';
        echo '<p>Message: '.$exception->getMessage().'</p>';
        echo '<p>Stack trace: <pre>'.$exception->getTraceAsString().'</pre></p>';
        echo '<p>Throw in '.$exception->getFile(). ' in line '.$exception->getLine().'</p>';
    }
}
