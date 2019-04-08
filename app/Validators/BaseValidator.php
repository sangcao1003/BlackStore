<?php

namespace App\Validators;

use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

abstract class BaseValidator
{
    protected function makeValidator(string $ruleMethod, Request $request)
    {
        if (!method_exists($this, $ruleMethod)) {
            throw new InvalidArgumentException('Validation rule does not exist.');
        }

        $validatorData = $this->{$ruleMethod}($request);

        return Validator::make(
            $request->all(array_keys($validatorData->rules)),
            $validatorData->rules,
            $validatorData->messages,
            $validatorData->attributes
        );
    }

    /**
     * Validate
     *
     * @param string $ruleMethod e.g. create
     * @param Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \InvalidArgumentException
     */
    public function validate(string $ruleMethod, Request $request)
    {
        return $this->makeValidator($ruleMethod, $request)->validate();
    }
}
