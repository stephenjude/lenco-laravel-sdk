<?php

namespace LencoSDK\Lenco\Resources;

class Account extends Resource
{
    public string $id;

    public string $name;

    public string $currency;

    public array $bankAccount;

    public string $type;

    public string $status;

    public string $availableBalance;

    public string $currentBalance;

    public string $createdAt;

    public function balance(): Balance
    {
        return $this->lenco->accountBalance($this->id);
    }

    public function bankAccount(): array
    {
        return new ResolvedAccount($this->bankAccount, $this->lenco);
    }
}
