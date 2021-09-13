<?php

namespace Sarah\validation\rules\contact;

interface rule{
    public function apply($field,$value,$data);
    public function __toString();
}