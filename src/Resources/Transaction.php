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

    public ?array $details = null;

    public ?array $virtualAccount = null;

    public string $accountReference;

    public string $settledAccountId;

    public string $datetime;

    public ?string $nipSessionId;

    public ?string $transactionReference;

    public function details(): ResolvedAccount
    {
        return new ResolvedAccount($this->details, $this->lenco);
    }

    public function virtualAccount(): ?VirtualAccount
    {
        return is_array($this->virtualAccount)
            ? new VirtualAccount($this->virtualAccount, $this->lenco)
            : null;
    }
}
