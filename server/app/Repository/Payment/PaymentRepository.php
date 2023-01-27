<?php

namespace App\Repository\Payment;

use App\Models\Payment;
use App\Repository\Products\ProductsRepositoryInterface;
use App\Repository\BaseRepository;
use Illuminate\Support\Collection;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Payment $model)
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
}