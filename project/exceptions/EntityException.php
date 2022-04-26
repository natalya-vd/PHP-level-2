<?php

namespace app\exceptions;
use Exception;

class EntityException extends Exception {
    private $variant;
    private $variantsError = [
        'get' => 'Нет такого поля get',
        'isset' => 'Нет такого поля isset'
    ];

    public function __construct($variant = null) {
        $this->variant = $variant;
    }

    public function getVariantEntity() {
        return $this->variant;
    }

    public function getVariantsError() {
        if(!is_null($this->variantsError[$this->variant])) {
            return $this->variantsError[$this->variant];
        }
    }
}
