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

### Supported APIs

```php
use LencoSDK\Lenco\Facades\Lenco;

 Lenco::accounts();
 
 Lenco::account(string $accountID);
 
 Lenco::accountBalance($accountID);
 
 Lenco::banks();
 
 Lenco::resolve($accountNumber, $bankCode);
 
 Lenco::transactions(
     $page = null, 
     $status = null, 
     $type = null, $start = null, 
     $end = null, $search = null, array 
     $accountIds = null
 );
 
 Lenco::transactionById($transactionId);
 
 Lenco::transactionByReference($transactionReference);
 
 Lenco::createVirtualAccount(
     $accountName, 
     $transactionReference = null,  
     $amount = null,  
     $minAmount = null,  
     $isStatic = false,  
     $createNewAccount = false, 
     $bvn = null
 );
 
 Lenco::virtualAccounts($page = null);
 
 Lenco::virtualAccountByReference($accountReference);
 
 Lenco::virtualAccountByBVN($bvn);
 
 Lenco::virtualAccountTransactions($accountReference, $page = null);
 
 Lenco::virtualAccountTransaction($transactionId);

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
