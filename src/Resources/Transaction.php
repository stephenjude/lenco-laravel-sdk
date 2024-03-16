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

    public array $details;

    public array|null $virtualAccount = null;

    public string $accountReference;

    public string $settledAccountId;

    public string $datetime;

    public string $nipSessionId;

    public string $transactionReference;

    public function details(): array
    {
        return new ResolvedAccount($this->details, $this->lenco);
    }

    public function virtualAccount(): ?array
    {
        return is_array($this->virtualAccount)
            ? new VirtualAccount($this->virtualAccount, $this->lenco)
            : null;
    }
}
