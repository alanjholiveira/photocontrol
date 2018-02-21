<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContractValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'clientID'  => 'required',
            'name'  => 'required',
            'value'  => 'required',
            'contract'  => 'required',

        ],
        ValidatorInterface::RULE_UPDATE => [
            'clientID'  => 'required',
            'name'  => 'required',
            'value'  => 'required',
            'contract'  => 'required',
        ],
   ];
}
