<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Controllers;


class CustomerController extends \Core\Controller
{
    /**
     * Customer index action that shows customer list
     *
     * @return void
     */
    public function indexAction(): void
    {
        $this->forward('customer/list');
    }

    /**
     * Customer list action
     *
     * @return void
     */
    public function listAction(): void
    {
        $this->set('title', "Клієнти");

        $customers = $this->getModel('Customer')
            ->initCollection()
            ->getCollection()
            ->select();
        $this->set('customer', $customers);

        $this->renderLayout();
    }
}