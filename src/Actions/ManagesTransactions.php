<?php

namespace LencoSDK\Lenco\Actions;

use LencoSDK\Lenco\Resources\Transaction;
use OhDear\PhpSdk\Resources\Site;

trait ManagesTransactions
{
    /**
     * Get all bank accounts' transactions
     *
     * https://lenco-api.readme.io/reference/get-transactions
     *
     * @return array<Transaction>
     */
    public function transactions(
        ?string $page = null,
        ?string $status = null,
        ?string $type = null,
        ?string $start = null,
        ?string $end = null,
        ?string $search = null,
        ?array $accountIds = null,
    ): array {
        /**
         * Remove nulled parameters
         */
        $payload = array_filter([
            'page' => $page,
            'status' => $status,
            'type' => $type,
            'start' => $start,
            'end' => $end,
            'search' => $search,
            'accountIds' => $accountIds,
        ]);

        return $this->transformCollection(
            collection: $this->get('transactions', $payload),
            resourceClass: Transaction::class,
        );
    }

    /**
     * Get a specific transaction by ID.
     *
     * https://lenco-api.readme.io/reference/get-transaction-by-id
     */
    public function transactionById(string $transactionId): Transaction
    {
        return new Transaction (
            attributes: $this->get("transaction/$transactionId"),
            lenco: $this,
        );
    }

    /**
     * Get a specific transaction by reference.
     *
     * https://lenco-api.readme.io/reference/get-transaction-by-reference
     */
    public function transactionByReference(string $transactionReference): Transaction
    {
        return new Transaction (
            attributes: $this->get("transaction/$transactionReference"),
            lenco: $this,
        );
    }
}
