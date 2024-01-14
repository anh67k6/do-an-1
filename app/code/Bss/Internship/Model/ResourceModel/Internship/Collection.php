<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Model\ResourceModel\Internship;

/**
 * Copyright
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Construct function
     *
     * @return void
     */

    public function _construct()
    {
        $this->_init(\Bss\Internship\Model\Internship::class, \Bss\Internship\Model\ResourceModel\Internship::class);
    }
}
