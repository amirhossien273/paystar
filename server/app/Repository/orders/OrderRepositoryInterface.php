<?php
namespace App\Repository\orders;

use App\Model\Order;
use Illuminate\Support\Collection;

interface OrderRepositoryInterface
{
   public function all(): Collection;

   public function getOrder($product_id ,$factor_id);
}