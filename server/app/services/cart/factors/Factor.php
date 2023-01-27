<?php


namespace App\services\cart\factors;


use App\Repository\factors\FactorRepository;

class Factor {
    
    protected $factors;     

     
    public function __construct(FactorRepository $factors)     
    {         
        $this->factors = $factors;
    }


    public function hasFactor($userId, $status = null)
    {
        if($status == null){
            $status = 0;
        }

        if($this->factors->getUserFactor($userId, $status)){
            return true;
        }
        
        return false;
    }

    public function addFactors($factor)
    {
       return $this->factors->create($factor);
    }

    public function getUserFactors($userId, $status = null)
    {
        if($status == null){
            $status = 0;
        }

        return $this->factors->getUserFactor($userId, $status);
    }

   
}