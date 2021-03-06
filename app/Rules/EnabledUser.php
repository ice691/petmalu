<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class EnabledUser implements Rule
{

    private $user;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return User::whereEmail($value)->whereNull('disabled_at')->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your account is disabled!';
    }
}
