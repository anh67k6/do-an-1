<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Internship database
 */
class Internship extends AbstractDb
{
    /**
     * ...
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('internship', 'entity_id');
    }
}
