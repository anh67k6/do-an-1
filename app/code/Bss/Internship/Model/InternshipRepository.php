<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Model;

use Bss\Internship\Api\Data\InternshipInterface;
use Bss\Internship\Api\InternshipRepositoryInterface;
use Bss\Internship\Model\ResourceModel\Internship;

/**
 * Create Internship Repo to have save function
 */
class InternshipRepository implements InternshipRepositoryInterface
{
    /**
     * @var Internship
     */
    private $internshipResource;

    /**
     * @param Internship $internshipResource
     */
    public function __construct(
        Internship $internshipResource,
    ) {
        $this->internshipResource = $internshipResource;
    }

    /**
     * ...
     *
     * @param InternshipInterface $internship
     * @return InternshipInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(InternshipInterface $internship)
    {
        $this->internshipResource->save($internship);
        return $internship;
    }
}
