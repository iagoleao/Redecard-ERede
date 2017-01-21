<?php

namespace ERede\Responses;
use ERede\Base;

/**
 * Class CancelResponse
 *
 * This class is returned after cancel method.
 */
class CancelResponse extends Base
{
    private $returnCode = 0;
    private $message = "";
    private $tid = "";
    private $nsu = "";
    private $date = "";
    private $time = "";

    public function getReturnCode(){
        return $this->returnCode;
    }

    public function setReturnCode($returnCode){
        $this->returnCode = $returnCode;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getTid(){
        return $this->tid;
    }

    public function setTid($tid){
        $this->tid = $tid;
    }

    public function getNsu(){
        return $this->nsu;
    }

    public function setNsu($nsu){
        $this->nsu = $nsu;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getTime(){
        return $this->time;
    }

    public function setTime($time){
        $this->time = $time;
    }


    /**
     * Maps the public Rede's Wcf response object to sdk's response object.
     *
     * @param Array $wcfResponse
     * @return CancelResponse
     */
    public static function map($wcfResponse){
        $cancelResponse = new CancelResponse();

        if($wcfResponse->CodRet != "")
            $cancelResponse->setReturnCode($wcfResponse->CodRet);
        else
            $cancelResponse->setReturnCode(TransactionStatus::TransactionNotProcessed);

        $cancelResponse->setMessage($wcfResponse->MsgRet);
        $cancelResponse->setTid($wcfResponse->Tid);
        $cancelResponse->setNsu($wcfResponse->NumSqn);
        $cancelResponse->setDate($wcfResponse->Data);
        $cancelResponse->setTime($wcfResponse->Hora);

        return $cancelResponse;
    }
}