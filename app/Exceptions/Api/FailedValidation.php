<?php

namespace App\Exceptions\Api;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Support\MessageBag;

class FailedValidation extends Exception
{
    use ApiResponser;

    public function __construct(
        private MessageBag $errors
    ) {
    }

    public function render()
    {
        return $this->validationError($this->errors);
    }
}
