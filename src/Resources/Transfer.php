<?php

namespace LencoSDK\Lenco\Resources;

class Transfer extends Resource
{
    public string $id;

    public string $amount;

    public string $fee;

    public string $narration;

    public string $type;

    public string $initiatedAt;

    public string $completedAt;

    public string $accountId;

    public array $details;

    public string $status;

    public string $failedAt;

    public string $reasonForFailure;

    public string $clientReference;

    public string $transactionReference;

    public string $nipSessionId;

    public function details(): ResolvedAccount
    {
        return new ResolvedAccount($this->details, $this->lenco);
    }
}
