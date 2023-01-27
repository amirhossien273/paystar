<?php

namespace App\Repository\factors;

use App\Models\Factor;
use App\Repository\factors\FactorRepositoryInterface;
use App\Repository\BaseRepository;
use Illuminate\Support\Collection;

class FactorRepository extends BaseRepository implements FactorRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Factor $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }

   public function getUserFactor($id ,$status)
   {
     return $this->model->where('user_id', $id)->where('status', $status)->first();
   }

   public function getFactorWithOrder()
   {
    
    return $this->model->where("status", 0)
     ->with(["order" => function($query) {
       $query->with("product");
     }])->first();
   }
}