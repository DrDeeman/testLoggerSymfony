<?php
namespace App\Events;
use Symfony\Contracts\EventDispatcher\Event;

class TestEvent extends Event{

    public function __construct(
        private readonly string $message
    ){}
    
    /** @psalm-ignore-variable-property */
    public function getMessage():string{
        return $this->message;
    }

}