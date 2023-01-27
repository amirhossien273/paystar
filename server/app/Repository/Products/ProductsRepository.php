<?php

namespace App\Repository\Products;

use App\Models\Product;
use App\Repository\Products\ProductsRepositoryInterface;
use App\Repository\BaseRepository;
use Illuminate\Support\Collection;

class ProductsRepository extends BaseRepository implements ProductsRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Product $model)
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