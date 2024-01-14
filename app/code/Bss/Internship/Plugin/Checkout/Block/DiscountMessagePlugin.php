<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Plugin\Checkout\Block;

use Bss\Internship\Model\ResourceModel\Internship\CollectionFactory;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\Message\ManagerInterface;

/**
 * Message the discount to member
 */
class DiscountMessagePlugin
{
    /**
     *
     * @var \Bss\Internship\Model\ResourceModel\Internship\Collection|null
     */
    protected $internshipCollection;
    /**
     * @var CustomerSession
     */
    protected $customerSession;
    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @param CollectionFactory $internshipCollectionFactory
     * @param CustomerSession $customerSession
     * @param ManagerInterface $messageManager
     */

    public function __construct(
        CollectionFactory $internshipCollectionFactory,
        CustomerSession $customerSession,
        ManagerInterface $messageManager,
    ) {
        $this->internshipCollection = $internshipCollectionFactory->create();
        $this->customerSession = $customerSession;
        $this->messageManager = $messageManager;
    }

    /**
     * ...
     *
     * @return array
     */
    public function beforeToHtml()
    {
        if (!$this->customerSession->isLoggedIn()) {
            return [];
        }

        $customerEmail = $this->customerSession->getCustomer()->getEmail();
        $matchingInternship = $this->internshipCollection->addFieldToFilter('email', $customerEmail);

        if ($matchingInternship->getSize() > 0) {
            $this->messageManager->addSuccessMessage(__('You got 50% off for all orders!.'));
        }
        return[];
    }
}
