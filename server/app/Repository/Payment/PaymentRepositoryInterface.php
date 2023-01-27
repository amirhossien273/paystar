<?php
namespace App\Repository\Payment;

use App\Model\Product;
use Illuminate\Support\Collection;

interface PaymentRepositoryInterface
{
   public function all(): Collection;
}