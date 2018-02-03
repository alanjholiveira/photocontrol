<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'firstname'  => 'required',
            'lastname'  => 'required',
            'email'  => 'required|email|max:255',
            'phonenumber'  => 'required',
            'address1'  => 'required',
            'city'  => 'required',

        ],
        ValidatorInterface::RULE_UPDATE => [
            'firstname'  => 'required',
            'lastname'  => 'required',
            'email'  => 'required|email|max:255',
            'phonenumber'  => 'required',
            'address1'  => 'required',
            'city'  => 'required',
        ],
   ];
}
