<?php

declare(strict_types=1);

namespace Models;

use Core\Model;

/**
 * Class Product
 */
class Product extends Model
{
    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->tableName = 'products';
        $this->idColumn = 'id';
    }
}