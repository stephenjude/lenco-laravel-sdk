<?php

namespace LencoSDK\Lenco\Actions;

use LencoSDK\Lenco\Resources\Transfer;

trait ManagesTransfer
{
    /**
     * Initiate a bank transfer
     *
     * https://lenco-api.readme.io/reference/create-transaction
     */
    public function transfer(
        string $accountId,
        string $amount,
        string $narration,
        string $reference,
        ?string $accountNumber = null,
        ?string $bankCode = null,
        ?string $recipientId = null,
        ?string $senderName = null,
    ): Transfer {
        $payload = array_filter([
            'accountId' => $accountId,
            'recipientId' => $recipientId,
            'accountNumber' => $accountNumber,
            'bankCode' => $bankCode,
            'amount' => $amount,
            'narration' => $narration,
            'reference' => $reference,
            'senderName' => $senderName,
        ]);

        return new Transfer(
            attributes: $this->post('transactions', $payload),
            lenco: $this,
        );
    }

    /**
     * Get all bank accounts' transactions
     *
     * https://lenco-api.readme.io/reference/get-transactions
     *
     * @return array<Transfer>
     */
    public function transfers(
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
            resourceClass: Transfer::class,
        );
    }

    /**
     * Get a specific transfer by ID.
     *
     * https://lenco-api.readme.io/reference/get-transaction-by-id
     */
    public function transferById(string $transferId): Transfer
    {
        return new Transfer(
            attributes: $this->get("transaction/$transferId"),
            lenco: $this,
        );
    }

    /**
     * Get a specific transfer by reference.
     *
     * https://lenco-api.readme.io/reference/get-transaction-by-reference
     */
    public function transferByReference(string $transferReference): Transfer
    {
        return new Transfer(
            attributes: $this->get("transaction/$transferReference"),
            lenco: $this,
        );
    }
}
