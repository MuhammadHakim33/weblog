<?php

namespace App\Exceptions;

use Exception;

class ImageException extends Exception 
{
    public static function invalidAPI()
    {
        return new self("Server Error. Upload Image Failed, Try Again", 400);
    }
}