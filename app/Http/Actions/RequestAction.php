<?php

namespace App\Http\Actions;

use Illuminate\Support\MessageBag;

class RequestAction {
    /**
     * @var MessageBag
     */
    private $errors;

    public function __construct() {
        $this->errors = new MessageBag();
    }

    /**
     * @param string $message
     */
    private function toError(string $message) {
        $this->errors->add('creationError', $message);
    }
}
