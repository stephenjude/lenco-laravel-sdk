<?php

namespace LencoSDK\Lenco;

use Illuminate\Http\Client\PendingRequest;
use LencoSDK\Lenco\Actions\ManagesAccount;
use LencoSDK\Lenco\Actions\ManagesBank;
use LencoSDK\Lenco\Actions\ManagesTransactions;
use LencoSDK\Lenco\Actions\ManagesVirtualAccount;

class Lenco
{
    use MakesHttpRequest;
    use ManagesAccount;
    use ManagesBank;
    use ManagesVirtualAccount;
    use ManagesTransactions;

    public PendingRequest $client;

    protected function transformCollection(array $collection, string $resourceClass): array
    {
        return array_map(function ($attributes) use ($resourceClass) {
            return new $resourceClass($attributes, $this);
        }, $collection);
    }

    public function convertDateFormat(string $date, $format = 'YmdHis'): string
    {
        return (new \DateTimeImmutable($date))->format($format);
    }

}
