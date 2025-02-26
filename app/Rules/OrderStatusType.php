<?php

namespace App\Rules;

use App\Utils\enums\OrderStatus;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OrderStatusType implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!in_array($value, OrderStatus::values())) {
            $fail("The $attribute must be a valid enum value.");
        }
    }
}
