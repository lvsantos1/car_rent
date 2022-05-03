<?php

namespace App\ValueObjects\BRLicensePlate;

use App\ValueObjects\InvalidValueException;

class BRLicensePlate implements BRLicensePlateInterface {

        private string $licensePlate;

        public function __construct(string $licensePlate) {

            if(!$this->isValid($licensePlate)) {
                throw new InvalidValueException('Invalid license plate.');
            }

            if(\substr($licensePlate, 3, 1) != '-') {
                $licensePlate = substr($licensePlate, 0, 3) . '-' . substr($licensePlate, 3);
            }

            $this->licensePlate = $licensePlate;
        }
    
        public function getLicensePlate(): string {
            return $this->licensePlate;
        }
    
        public function __toString(): string
        {
            return $this->licensePlate;
        }

        public function jsonSerialize(): mixed
        {
            return $this->licensePlate;
        }
        
        private function isValid(string $licensePlate) : bool {
            return preg_match('/^[A-Z]{3}-?[0-9][0-9A-Z][0-9]{2}$/', $licensePlate);
        }
}