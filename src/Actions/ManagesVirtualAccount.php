<?php

namespace LencoSDK\Lenco\Actions;

use LencoSDK\Lenco\Resources\Transaction;
use LencoSDK\Lenco\Resources\VirtualAccount;
use OhDear\PhpSdk\Resources\Site;

trait ManagesVirtualAccount
{
    /**
     * Create a virtual account number.
     *
     * https://lenco-api.readme.io/reference/create-virtual-accounts
     */
    public function createVirtualAccount(
        string $accountName,
        ?string $transactionReference = null,
        ?float $amount = null,
        ?float $minAmount = null,
        bool $isStatic = false,
        bool $createNewAccount = false,
        ?string $bvn = null
    ): VirtualAccount {
        /**
         * Remove nulled parameters
         */
        $payload = array_filter([
            'accountName' => $accountName,
            'transactionReference' => $transactionReference,
            'amount' => $amount,
            'minAmount' => $minAmount,
            'bvn' => $bvn
        ]);

        /**
         * Append boolean parameters.
         */
        $payload = array_merge($payload, [
            'isStatic' => $isStatic,
            'createNewAccount' => $createNewAccount,
        ]);

        return new VirtualAccount (
            attributes: $this->post('virtual-accounts', $payload),
            lenco: $this,
        );
    }

    /**
     * Get all static virtual accounts.
     *
     * https://lenco-api.readme.io/reference/get-static-virtual-accounts
     *
     * @return array<VirtualAccount>
     */
    public function virtualAccounts(?string $page = null): array
    {
        return $this->transformCollection(
            collection: $this->get('virtual-accounts', array_filter(['page' => $page]))['virtualAccounts'],
            resourceClass: VirtualAccount::class,
        );
    }

    /**
     * Get a virtual account details by the account reference.
     *
     * https://lenco-api.readme.io/reference/get-virtual-account-by-account-reference
     */
    public function virtualAccountByReference(string $accountReference): VirtualAccount
    {
        return new VirtualAccount (
            attributes: $this->get("virtual-accounts/$accountReference"),
            lenco: $this,
        );
    }

    /**
     * Get a virtual account details by the bvn.
     *
     * https://lenco-api.readme.io/reference/get-static-virtual-account-by-bvn
     */
    public function virtualAccountByBVN(string $bvn): VirtualAccount
    {
        return new VirtualAccount (
            attributes: $this->get("virtual-account-by-bvn/$bvn")['virtualAccounts'],
            lenco: $this,
        );
    }

    /**
     * Get virtual account transactions.
     *
     * https://lenco-api.readme.io/reference/get-virtual-account-transactions
     *
     * @return array<Transaction>;
     */
    public function virtualAccountTransactions(string $accountReference, ?string $page = null): array
    {
        $payload = array_filter(['page' => $page, 'accountReference' => $accountReference]);

        return $this->transformCollection(
            collection: $this->get("virtual-accounts/transactions", $payload)['transactions'],
            resourceClass: Transaction::class,
        );
    }


    /**
     * Get a specific virtual account transaction.
     *
     * @url https://lenco-api.readme.io/reference/get-virtual-account-transaction-by-id
     */
    public function virtualAccountTransaction(string $transactionId): array
    {
        return $this->transformCollection(
            collection: $this->get("virtual-accounts/transactions/$transactionId"),
            resourceClass: Transaction::class,
        );
    }
}
