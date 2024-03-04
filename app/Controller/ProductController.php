<?php

namespace Nuazsa\Simplemvc\Controller;

class ProductController
{
    public function categories(string $category, string $id): void
    {
        echo "SELECT $category FROM products WHERE id=$id";
    }
}
