<?php

namespace LencoSDK\Lenco\Resources;

class ResolvedAccount extends Resource
{
    public string $accountName;

    public string $accountNumber;

    public Bank $bank;
}
