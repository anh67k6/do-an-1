<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Api;

/**
 * Create Interface for internship repository
 */
interface InternshipRepositoryInterface
{
    /**
     * Function save interface
     *
     * @param Data\InternshipInterface $user
     * @return mixed
     */
    public function save(\Bss\Internship\Api\Data\InternshipInterface $user);
}
