<?php


namespace App\services\cart\factors;

use App\Models\User;
use App\services\cart\factors\Factor;

class FactorService {
    
    protected $factors;     
  
    public function __construct(Factor $factors)     
    {         
        $this->factors = $factors;
    }

    public  function addUserToFactor(User $user)
    {
       if(!$this->factors->hasFactor($user->id)){
           return $this->factors->addFactors([
             "user_id" => $user->id
           ]);
       }

       return $this->factors->getUserFactors($user->id);
    }
}