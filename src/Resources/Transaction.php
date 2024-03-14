<?php

namespace LencoSDK\Lenco\Resources;

class Transaction extends Resource
{
    public string $id;

    public string $transactionAmount;

    public string $fee;

    public string $stampDuty;

    public string $settledAmount;

    public string $currency;

    public string $type;

    public string $status;

    public string $narration;

    public ?ResolvedAccount $details;

    public ?VirtualAccount $virtualAccount = null;

    public string $accountReference;

    public string $settledAccountId;

    public string $datetime;

    public string $nipSessionId;

    public string $transactionReference;
}
