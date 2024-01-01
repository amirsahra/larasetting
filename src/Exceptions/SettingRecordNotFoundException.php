<?php

namespace Amirsahra\Larasetting\Exceptions;

use Exception;

class SettingRecordNotFoundException extends Exception
{
    public function __construct($key = '', $code = 404, Exception $previous = null)
    {
        $message = "The '$key' key does not exist";
        parent::__construct($message, $code, $previous);
    }
}
