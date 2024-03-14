<?php

namespace LencoSDK\Lenco\Actions;

use LencoSDK\Lenco\Resources\Bank;
use LencoSDK\Lenco\Resources\ResolvedAccount;

trait ManagesBank
{
    /**
     * List all payout banks.
     *
     * https://lenco-api.readme.io/reference/get-banks
     *
     * @return array<Bank>
     */
    public function banks(): array
    {
        return $this->transformCollection(
            collection: $this->get('banks'),
            resourceClass: Bank::class,
        );
    }

    /**
     * Resolve payout account details.
     *
     * https://lenco-api.readme.io/reference/resolve-account
     */
    public function resolve(string $accountNumber, string $bankCode): ResolvedAccount
    {
        return new ResolvedAccount(
            attributes: $this->get('resolve', ['accountNumber' => $accountNumber, 'bankCode' => $bankCode]),
            lenco: $this,
        );
    }
}
