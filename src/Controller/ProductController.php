<?php

namespace Controller;

use Repository\ProductRepository;


class ProductController extends AbstractController
{
    /**
     * Route
     */
    public function showProducts()
    {
        $stmt = $this->getRepository()->findAll();
        $this->jsonResponse($stmt->fetchAll());
    }

    private function getRepository()
    {
        return new ProductRepository($this->getConnection());
    }
}





