<?php

namespace LencoSDK\Lenco\Actions;

use LencoSDK\Lenco\Resources\Account;
use LencoSDK\Lenco\Resources\Balance;
use OhDear\PhpSdk\Resources\Site;

trait ManagesAccount
{
    /**
     * List all bank accounts.
     *
     * https://lenco-api.readme.io/reference/get-accounts
     *
     * @return array<Account>
     */
    public function accounts(): array
    {
        return $this->transformCollection(
            collection: $this->get('accounts'),
            resourceClass: Account::class,
        );
    }

    /**
     * Get a specific account by ID.
     *
     * https://lenco-api.readme.io/reference/get-account-by-id
     */
    public function account(string $accountID): Account
    {
        return new Account(
            attributes: $this->get("account/$accountID",),
            lenco: $this,
        );
    }

    /**
     * Get a specific account balance by account ID.
     *
     * https://lenco-api.readme.io/reference/get-account-balance
     */
    public function accountBalance(string $accountID): Balance
    {
        return new Balance(
            attributes: $this->get("account/$accountID/balance",),
            lenco: $this,
        );
    }
}
