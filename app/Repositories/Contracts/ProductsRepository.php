<?php 

namespace App\Repositories\Contracts;
use App\Repositories\RepositoryInterface;

interface ProductsRepository extends RepositoryInterface {
    public function getProduct($id);
}