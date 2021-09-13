<?php
namespace Sarah\validation\rules;

use Sarah\validation\rules\contact\rule;

class requiredRule implements rule {

public function apply($field,$value,$data){
return !empty($value);
}

public function __toString()
{
    return '%s is required and can not be empty';
}
}