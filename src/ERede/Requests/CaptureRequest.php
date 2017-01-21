<?php

namespace ERede\Requests;
use ERede\Base;

/**
 * Class CaptureRequest
 *
 * This class is filled with information to confirm a transaction.
 * The request object sent to the server.
 */
class CaptureRequest extends Base
{
    private $amount = 0.0;
    private $tid = "";

    public function getAmount(){
        return $this->amount;
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function getTid(){
        return $this->tid;
    }

    public function setTid($tid){
        $this->tid = $tid;
    }


    /**
     * Maps sdk's request object to public Rede's Wcf request object.
     *
     * @param captureRequest $captureRequest
     * @param Security $security
     * @return array
     */
    public static function map($captureRequest, $security){
        $wcfRequest = array(
            "Filiacao" => $security->affiliation    ,
            "Senha"    => $security->password       ,

            "Tid"      => $captureRequest->getTid() ,
            "Total"    => number_format($captureRequest->getAmount(), 2, '.', ''),
        );

        return $wcfRequest;
    }
}