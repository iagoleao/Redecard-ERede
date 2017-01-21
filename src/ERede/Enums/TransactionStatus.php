<?php

namespace ERede\Enums;
/**
 * Class TransactionStatus
 *
 * TransactionStatus maps the Transation Status.
 */
abstract class TransactionStatus
{
    const Success                   = 0;
    const ValidationError           = 1;
    const TransactionNotProcessed   = 2;
    const TransactionNotApproved    = 3;
}
