<?php
namespace App\Services;

use Illuminate\Validation\Validator;

class Validation extends Validator{
    public function ValidateTags($attribute, $value, $parameters){

        return preg_match("\d{1,}/", $value);
    }
}
?>