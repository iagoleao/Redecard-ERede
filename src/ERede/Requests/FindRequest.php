<?php

namespace ERede\Requests;
use ERede\Base;

/**
 * Class FindRequest
 *
 * This class is filled with information to find a transaction.
 * The request object sent to the server.
 */
class FindRequest extends Base
{
    private $tid = "";
    private $reference = "";

    public function getTid(){
        return $this->tid;
    }

    public function setTid($tid){
        $this->tid = $tid;
    }

    public function getReference(){
        return $this->reference;
    }

    public function setReference($reference){
        $this->reference = $reference;
    }



    /**
     * Maps sdk's request object to public Rede's Wcf request object.
     *
     * @param FindRequest $findRequest
     * @param Security $security
     * @return array
     */
    public static function map($findRequest, $security){
        $wcfRequest = array(
            "Filiacao"  => $security->affiliation                  ,
            "Senha"     => $security->password                     ,

            "Tid"       => self::toNull($findRequest->getTid())    ,
            "NumPedido" => self::toNull($findRequest->getReference()),
        );

        return $wcfRequest;
    }
}