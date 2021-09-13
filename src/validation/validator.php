<?php

namespace Sarah\validation;

class validator{
    protected array $data=[];
    protected array $aliases=[];
    protected array $rules=[];
    protected errorBag $errorBag;


    public function make($data){
        $this->data=$data;
        $this->errorBag=new errorBag;
        $this->validate();

    }

    public function validate(){
        foreach($this->rules as $field=>$rules){
            foreach($rules as$rule){

                if(!($rule->apply($field,$this->getFieldValue($field),$this->data))){
                  return  $this->errorBag->add($field,message::generate($rule,$field));
            
                }
            }
        }
    }
    public function getFieldValue($field){
        return $this->data[$field] ?? null;
    }

    public function setRules($rules){
         $this->rules=$rules;
    }


    public function passes(){
        return empty($this->errors());
    }
    public function errors($key=null){
        return $key? $this->errorBag->errors[$key]: $this->errorBag->errors;
    }

    public function alias($field){
        return $this->aliases[$field]??$field;
    }
    public function setAliases(array $aliases){
        $this->aliases=$aliases;
    }
}