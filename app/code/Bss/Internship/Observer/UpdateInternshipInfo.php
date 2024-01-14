<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Observer;

use Bss\Internship\Model\InternshipRepository;
use Bss\Internship\Model\ResourceModel\Internship\CollectionFactory;
use Bss\Internship\Model\ResourceModel\InternshipFactory;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Update information in db in case have the same email
 */

class UpdateInternshipInfo implements ObserverInterface
{
    /**
     * @var InternshipFactory
     */
    protected $internshipFactory;
    /**
     * @var CustomerFactory
     */
    protected $customerFactory;
    /**
     * @var CollectionFactory
     */
    protected $internshipCollectionFactory;
    /**
     * @var InternshipRepository
     */
    protected $internshipRepository;

    /**
     * @param InternshipFactory $internshipFactory
     * @param CustomerFactory $customerFactory
     * @param CollectionFactory $internshipCollectionFactory
     * @param InternshipRepository $internshipRepository
     */
    public function __construct(
        InternshipFactory $internshipFactory,
        CustomerFactory $customerFactory,
        CollectionFactory $internshipCollectionFactory,
        InternshipRepository $internshipRepository,
    ) {
        $this->internshipFactory = $internshipFactory;
        $this->customerFactory = $customerFactory;
        $this->internshipCollectionFactory = $internshipCollectionFactory;
        $this->internshipRepository = $internshipRepository;
    }

    /**
     * Change email information if new account have the same
     *
     * @param Observer $observer
     * @return void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $customerEmail = $customer->getEmail();
        $internshipCollection = $this->internshipCollectionFactory->create();
        $internshipCollection->addFieldToFilter('email', $customerEmail);
        if ($internshipCollection->getSize() > 0) {
            $existingCustomer = $internshipCollection->getFirstItem();
            $fullName = $customer->getFirstname() . ' ' . $customer->getLastname();
            $existingCustomer->setData('full_name', $fullName);
            $this->internshipRepository->save($existingCustomer);
        }
    }
}
