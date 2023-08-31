<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PlaylistURLRule implements ValidationRule
{
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

        if(!in_array($url['host'], ['www.youtube.com', 'youtube.com', 'youtu.be', 'soundcloud.com', 'spotify.com', 'open.spotify.com'])){
            $fail("Website not supported");
        }
    }
}
