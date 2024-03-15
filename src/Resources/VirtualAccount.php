<?php

namespace LencoSDK\Lenco\Resources;

class VirtualAccount extends Resource
{
    public string $id;

    public string $accountReference;

    public ResolvedAccount $bankAccount;

    public string $currency;

    public string $type;

    public array $meta;

    public string $status;

    public string $createdAt;

    public string $expiresAt;

    public function transactions(?string $page = null): array
    {
        return $this->lenco->virtualAccountTransactions(
            accountReference: $this->accountReference,
            page: $page
        );
    }
}
