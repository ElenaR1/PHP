<?php
    abstract class Validate {
        protected $invalid_field;
        protected $isValid;
        protected $fields;
        protected $errors;
        protected $requirements;
        protected $data; 
        public function __construct(array $data, array $requirements){
            $this->data = $data;
            $this->requirements = $requirements;
            $this->fields = array_keys($data);
            $this->errors = array();
            $this->invalid_field = null;
            $this->isValid = false;
        }
        
        abstract public function isValid();
        abstract public function getInvalidField();
        abstract public function printError();	
    };
    
    class ValidateCourse extends Validate {
	
        public function __construct(array $data, array $requirements){
            parent::__construct($data, $requirements);
        }
        
        public function isValid() {
            $field = $this->fields[0];
            if(strlen($this->data[$field]) > $this->requirements[$field]['max']) {
                $this->errors[$field] =
                                "$field има проблем. Дължината трябва да е по-малка от "
                                . $this->requirements[$field]['max'];
                $this->invalid_field = $field;
            }
            
            $field = $this->fields[1];
            if(strlen($this->data[$field]) > $this->requirements[$field]['max']) {
                $this->errors[$field] =
                                "$field има проблем. Дължината трябва да е по-малка от "
                                . $this->requirements[$field]['max'];
                $this->invalid_field = $field;
            }
            
            $field = $this->fields[2];
            if(strlen($this->data[$field]) < $this->requirements[$field]['min']) {
                $this->errors[$field] =
                                "$field има проблем. Дължината трябва да е по-голяма от "
                                . $this->requirements[$field]['min'];
                $this->invalid_field = $field;
            }
            
            return empty($this->errors);
        }
        
        public function getInvalidField() {
            return (string)$this->invalid_field;
        }
        
        public function printError() {
            foreach($this->errors as $err){
                echo "<p style=\"color:red\"> $err </p>"; 
            }
        }
    };
?>