<?php
namespace App\Repository\Products;

use App\Model\Product;
use Illuminate\Support\Collection;

interface ProductsRepositoryInterface
{
   public function all(): Collection;
}