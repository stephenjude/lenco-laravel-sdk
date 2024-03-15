<?php

namespace LencoSDK\Lenco\Resources;

use LencoSDK\Lenco\Lenco;

#[\AllowDynamicProperties]
abstract class Resource
{
    public function __construct(protected array $attributes = [], protected ?Lenco $lenco = null)
    {
        $this->fill();
    }

    protected function fill(): void
    {
        collect($this->attributes)->each(function ($value, $key) {
            $attribute = $this->camelCase($key);

            if (is_array($value) && $class = get_class($this->{$attribute})) {
                return $this->{$attribute} = new $class($value, $this->lenco);
            }

            return $this->{$attribute} = $value;
        });
    }

    protected function camelCase(string $key): string
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }
}
