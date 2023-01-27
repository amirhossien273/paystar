<?php
namespace App\Repository\User;

use App\Model\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function all(): Collection;
}