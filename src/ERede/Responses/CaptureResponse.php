<?php

namespace ERede\Responses;
use ERede\Base;

/**
 * Class CaptureResponse
 *
 * This class is returned after capture method.
 */
class CaptureResponse extends Base
{
    private $returnCode = 0;
    private $message = "";
    private $reference = "";
    private $authorizationNumber = "";
    private $nsu = "";
    private $tid = "";
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

    public function getReference(){
        return $this->reference;
    }

    public function setReference($reference){
        $this->reference = $reference;
    }

    public function getAuthorizationNumber(){
        return $this->authorizationNumber;
    }

    public function setAuthorizationNumber($authorizationNumber){
        $this->authorizationNumber = $authorizationNumber;
    }

    public function getNsu(){
        return $this->nsu;
    }

    public function setNsu($nsu){
        $this->nsu = $nsu;
    }

    public function getTid(){
        return $this->tid;
    }

    public function setTid($tid){
        $this->tid = $tid;
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
     * @return CaptureResponse
     */
    public static function map($wcfResponse){
        $captureResponse = new CaptureResponse();

        if($wcfResponse->CodRet != "")
            $captureResponse->setReturnCode($wcfResponse->CodRet);
        else
            $captureResponse->setReturnCode(TransactionStatus::TransactionNotProcessed);

        $captureResponse->setMessage($wcfResponse->Msgret);
        $captureResponse->setReference($wcfResponse->NumPedido);
        $captureResponse->setAuthorizationNumber($wcfResponse->NumAutor);
        $captureResponse->setNsu($wcfResponse->NumSqn);
        $captureResponse->setTid($wcfResponse->Tid);
        $captureResponse->setDate($wcfResponse->Data);
        $captureResponse->setTime($wcfResponse->Hora);

        return $captureResponse;
    }
}