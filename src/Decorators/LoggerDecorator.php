<?php

namespace App\Decorators;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\Event;
use App\Events\TestEvent;


class LoggerDecorator implements EventDispatcherInterface
{
   

    /** @psalm-ignore-variable-method */
    /** @psalm-ignore-variable-property */
    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly LoggerInterface $logger
    ){}


    public function dispatch(object $event): void
    {   
        if($event instanceof TestEvent)
        $this->logger->info('Message:'.$event->getMessage());
        
        

        $this->eventDispatcher->dispatch($event);
    }
}