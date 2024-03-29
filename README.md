#  Lenco Laravel SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/lenco-laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/stephenjude/lenco-laravel-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/stephenjude/lenco-laravel-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/stephenjude/lenco-laravel-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/stephenjude/lenco-laravel-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/stephenjude/lenco-laravel-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/stephenjude/lenco-laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/stephenjude/lenco-laravel-sdk)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```bash
composer require stephenjude/lenco-laravel-sdk
```

Add Lenco API token to your `.env` file.

```dotenv
LENCO_API_TOKEN=xxxx_xxxx_xxxx_xxxx
```
## Usage

### Using Class Instance
```php
use \LencoSDK\Lenco\Lenco;

$lenco = new Lenco();

$banks = $lenco->banks();
```

### Using Facade Instance
```php
use \LencoSDK\Lenco\Facades\Lenco;

$banks  = Lenco::banks();
```

### Supported APIs & Usage

```php
    use LencoSDK\Lenco\Facades\Lenco;
    
    Lenco::accounts();

    Lenco::account(accountID: $accountID);

    Lenco::accountBalance(accountID: $accountID);

    Lenco::banks();

    Lenco::resolve(accountNumber: $accountNumber, bankCode: $bankCode);

    Lenco::transactions(
        page: $page = null,
        status: $status = null,
        type: $type = null,
        start: $start = null,
        end: $end = null,
        search: $search = null,
        accountIds: $accountIds = null
    );

    Lenco::transactionById(transactionId: $transactionId);

    Lenco::transactionByReference(transactionReference: $transactionReference);

    Lenco::createVirtualAccount(
        accountName: $accountName,
        transactionReference: $transactionReference = null,
        amount: $amount = null,
        minAmount: $minAmount = null,
        isStatic: $isStatic = false,
        createNewAccount: $createNewAccount = false,
        bvn: $bvn = null
    );

    Lenco::virtualAccounts(page: $page = null);

    Lenco::virtualAccountByReference(accountReference: $accountReference);

    Lenco::virtualAccountByBVN(bvn: $bvn);

    Lenco::virtualAccountTransactions(accountReference: $accountReference, page: $page = null);

    Lenco::virtualAccountTransaction(transactionId: $transactionId);

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [stephenjude](https://github.com/stephenjude)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
