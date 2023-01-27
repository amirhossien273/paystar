<?php

namespace App\Repository\orders;

use App\Models\Order;
use App\Repository\orders\ProductsRepositoryInterface;
use App\Repository\BaseRepository;
use Illuminate\Support\Collection;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Order $model)
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

   public function getOrder($product_id ,$factor_id)
   {
     return $this->model->where('product_id', $product_id)->where('factor_id', $factor_id)->first();
   }
}