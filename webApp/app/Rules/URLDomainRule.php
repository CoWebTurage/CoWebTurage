<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class URLDomainRule implements ValidationRule
{
    private array $domains;

    public function __construct(array $domains)
    {
        $this->domains = $domains;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $url = parse_url($value);

        if(!key_exists('host', $url)) {
            $fail('Invalid URL');
            return;
        }

        if(!in_array($url['host'], $this->domains)){
            $fail("Website not supported");
        }
    }
}
