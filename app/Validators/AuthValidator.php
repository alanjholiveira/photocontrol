<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class AuthValidator extends LaravelValidator
{
    protected $rules = [
        'email'  => 'required|email|max:255',
        'password'  => 'required|min:6|max:255'
    ];

}