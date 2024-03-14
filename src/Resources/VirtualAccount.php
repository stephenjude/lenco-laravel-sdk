<?php

namespace LencoSDK\Lenco\Resources;

class VirtualAccount extends Resource
{
    public string $id;

    public string $accountReference;

    public string $accountName;

    public string $accountNumber;

    public string $bankCode;

    public string $bankName;

    public string $currency;

    public string $type;

    public string $status;

    public string $createdAt;

    public string $expiresAt;

}
