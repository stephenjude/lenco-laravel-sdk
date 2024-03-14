<?php

namespace LencoSDK\Lenco\Resources;

class Account extends Resource
{
    public string $id;

    public string $name;

    public string $currency;

    public ?ResolvedAccount $bankAccount = null;

    public string $type;

    public string $status;

    public string $availableBalance;

    public string $currentBalance;

    public string $createdAt;

    public function balance(): Balance
    {
        return $this->lenco->accountBalance($this->id);
    }
}
