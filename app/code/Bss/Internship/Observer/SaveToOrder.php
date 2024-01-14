<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Observer;

/**
 * Set data of the order
 */
class SaveToOrder implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * ...
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $event = $observer->getEvent();
        $quote = $event->getQuote();
        $order = $event->getOrder();
        $order->setData('custom_vat', $quote->getData('custom_vat'));
    }
}
