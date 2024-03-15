<?php

namespace LencoSDK\Lenco\Facades;

use Illuminate\Support\Facades\Facade;
use LencoSDK\Lenco\Resources\Account;
use LencoSDK\Lenco\Resources\Balance;
use LencoSDK\Lenco\Resources\Bank;
use LencoSDK\Lenco\Resources\ResolvedAccount;
use LencoSDK\Lenco\Resources\Transaction;
use LencoSDK\Lenco\Resources\VirtualAccount;

/**
 * @see \LencoSDK\Lenco\Lenco
 *
 * @method static array<Account> accounts()
 * @method static Account account(string $accountID)
 * @method static Balance accountBalance(string $accountID)
 * @method static array<Bank> banks()
 * @method static ResolvedAccount resolve(string $accountNumber, string $bankCode)
 * @method static array transactions(?string $page = null, ?string $status = null, ?string $type = null, ?string $start = null, ?string $end = null, ?string $search = null, ?array $accountIds = null)
 * @method static Transaction transactionById(string $transactionId)
 * @method static Transaction transactionByReference(string $transactionReference)
 * @method static VirtualAccount createVirtualAccount(string $accountName, ?string $transactionReference = null, ?float $amount = null, ?float $minAmount = null, bool $isStatic = false, bool $createNewAccount = false, ?string $bvn = null)
 * @method static array<VirtualAccount> virtualAccounts(?string $page = null)
 * @method static VirtualAccount virtualAccountByReference(string $accountReference)
 * @method static VirtualAccount virtualAccountByBVN(string $bvn)
 * @method static array<Transaction> virtualAccountTransactions(string $accountReference, ?string $page = null)
 * @method static Transaction virtualAccountTransaction(string $transactionId)
 */
class Lenco extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \LencoSDK\Lenco\Lenco::class;
    }
}
