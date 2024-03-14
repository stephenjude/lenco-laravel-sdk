<?php

namespace LencoSDK\Lenco\Actions;

use LencoSDK\Lenco\Resources\VirtualAccount;

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
            'bvn' => $bvn,
        ]);

        /**
         * Append boolean parameters.
         */
        $payload = array_merge($payload, [
            'isStatic' => $isStatic,
            'createNewAccount' => $createNewAccount,
        ]);

        return new VirtualAccount(
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
            $this->get('virtual-accounts', array_filter(['page' => $page]))['virtualAccounts'],
            VirtualAccount::class,
        );
    }

    /**
     * Get a virtual account details by the account reference.
     *
     * https://lenco-api.readme.io/reference/get-virtual-account-by-account-reference
     */
    public function virtualAccount(string $accountReference): VirtualAccount
    {
        return new VirtualAccount(
            $this->get("virtual-accounts/$accountReference")['virtualAccounts'],
            $this,
        );
    }
}
