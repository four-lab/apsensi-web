<?php

namespace App\Exceptions\Api;

use App\Traits\ApiResponser;
use Exception;

class ErrorResponse extends Exception
{
    use ApiResponser;

    public function __construct(
        private array $data,
        private string $message,
        private int $code
    ) {
    }

    public function render()
    {
        return $this->error($this->data, $this->message, $this->code);
    }
}
