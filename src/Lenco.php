<?php

namespace LencoSDK\Lenco;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use LencoSDK\Lenco\Actions\ManagesAccount;
use LencoSDK\Lenco\Actions\ManagesBank;
use LencoSDK\Lenco\Actions\ManagesTransactions;
use LencoSDK\Lenco\Actions\ManagesVirtualAccount;

class Lenco
{
    use MakesHttpRequest;
    use ManagesAccount;
    use ManagesBank;
    use ManagesTransactions;
    use ManagesVirtualAccount;

    public PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::baseUrl(config('lenco.api_url'))
            ->withToken(config('lenco.api_token'))
            ->contentType('application/json')
            ->acceptJson()
            ->throw();
    }

    protected function transformCollection(array $collection, string $resourceClass): array
    {
        return array_map(function ($attributes) use ($resourceClass) {
            return new $resourceClass($attributes, $this);
        }, $collection);
    }
}
