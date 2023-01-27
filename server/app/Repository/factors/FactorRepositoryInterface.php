<?php
namespace App\Repository\factors;

use Illuminate\Support\Collection;

interface FactorRepositoryInterface
{
   public function all(): Collection;

   public function getUserFactor($id ,$status);

   public function getFactorWithOrder();
}