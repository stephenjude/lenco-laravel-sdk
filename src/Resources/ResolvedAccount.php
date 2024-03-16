<?php

namespace LencoSDK\Lenco\Resources;

class ResolvedAccount extends Resource
{
    public string $accountName;

    public string $accountNumber;

    public array $bank;

    public function bank(): Bank
    {
        return new Bank($this->bank, $this->lenco);
    }
}
