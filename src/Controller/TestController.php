<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Decorators\EventDecorator;
use App\Events\TestEvent;

class TestController{
    
    /** @psalm-ignore-variable-method */
    public function __construct(
        private readonly EventDecorator $logger
    ){}
   

    #[Route(path:'/api/test/event', methods:['GET'])]
    public function test(Request $req){
        
        $message = 'Сообщение не передано';

        if($req->query->has('message'))
        $message = $req->query->get('message') ;
        
        $this->logger->dispatch(new TestEvent($message));

        return new Response();
    }
}