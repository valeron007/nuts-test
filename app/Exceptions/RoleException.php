<?php

namespace App\Exceptions;

use Exception;

class RoleException extends Exception
{
    //
    protected $code = 403;
    protected $message = "У пользователя нет прав на создание заявки";

    public function __construct($message = "", $code = 403) { }


}
