<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Models;


class Customer extends \Core\Model
{
    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->tableName = 'customer';
        $this->idColumn = 'customer_id';
    }
}