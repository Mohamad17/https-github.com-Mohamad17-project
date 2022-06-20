<?php
namespace App\Http\Services\Message\SMS;

use App\Http\Interfaces\MessageInterface;

class SmsService implements MessageInterface{
    private $from;
    private $to;
    private $text;
    private $isFlash=true;
    
    public function fire(){

    }

    public function getFrom(){
        return $this->from;
    }
    public function setFrom($from){
        $this->from=$from;
    }

    public function getTo(){
        return $this->to;
    }
    public function setTo($to){
        $this->to=$to;
    }

    public function getText(){
        return $this->text;
    }
    public function setText($text){
        $this->text=$text;
    }

}