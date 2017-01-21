<?php

namespace ERede\Enums;
/**
* Class TransactionType
* 
* TransactionType maps the Transation Type. 
*/
abstract class TransactionType
{
    const Credit                  = 4;
    const InstallmentCreditIssuer = 8;
    const PreAuthorization        = 74;
}
