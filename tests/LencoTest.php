<?php

use Illuminate\Http\Client\PendingRequest;

it('can test sdk instance', function () {
    $lenco = new LencoSDK\Lenco\Lenco();

    expect($lenco)->toBeObject();

    expect($lenco->client)->toBeInstanceOf(PendingRequest::class);

    expect(method_exists($lenco, 'transformCollection'))->toBeTrue();
});

it('can test virtual account api', function () {
    $lenco = new LencoSDK\Lenco\Lenco();

    expect(method_exists($lenco, 'createVirtualAccount'))->toBeTrue();

    expect(method_exists($lenco, 'virtualAccounts'))->toBeTrue();

    expect(method_exists($lenco, 'virtualAccountByReference'))->toBeTrue();

    expect(method_exists($lenco, 'virtualAccountByBVN'))->toBeTrue();

    expect(method_exists($lenco, 'virtualAccountByBVN'))->toBeTrue();
});

it('can test bank resolve api', function () {
    $lenco = new LencoSDK\Lenco\Lenco();

    expect(method_exists($lenco, 'banks'))->toBeTrue();

    expect(method_exists($lenco, 'resolve'))->toBeTrue();
});

it('can test account api', function () {
    $lenco = new LencoSDK\Lenco\Lenco();

    expect(method_exists($lenco, 'accounts'))->toBeTrue();

    expect(method_exists($lenco, 'account'))->toBeTrue();

    expect(method_exists($lenco, 'accountBalance'))->toBeTrue();
});

it('can test transfer api', function () {
    $lenco = new LencoSDK\Lenco\Lenco();

    expect(method_exists($lenco, 'transfer'))->toBeTrue();

    expect(method_exists($lenco, 'transfers'))->toBeTrue();

    expect(method_exists($lenco, 'transferById'))->toBeTrue();

    expect(method_exists($lenco, 'transferByReference'))->toBeTrue();
});
