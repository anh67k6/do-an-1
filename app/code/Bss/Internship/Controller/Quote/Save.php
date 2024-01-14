<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Controller\Quote;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Model\QuoteIdMaskFactory;

/**
 * Save custom_vat from quote
 */
class Save implements HttpPostActionInterface
{
    /**
     *
     * @var QuoteIdMaskFactory
     */
    protected $quoteIdMaskFactory;
    /**
     * @var Http
     */
    protected $httpRequest;
    /**
     * @var CartRepositoryInterface
     */
    protected $quoteRepository;

    /**
     * @param QuoteIdMaskFactory $quoteIdMaskFactory
     * @param CartRepositoryInterface $quoteRepository
     * @param Http $httpRequest
     */
    public function __construct(
        QuoteIdMaskFactory $quoteIdMaskFactory,
        CartRepositoryInterface $quoteRepository,
        Http $httpRequest
    ) {
        $this->quoteRepository = $quoteRepository;
        $this->httpRequest = $httpRequest;
        $this->quoteIdMaskFactory = $quoteIdMaskFactory;
    }

    /**
     * ..
     *
     * @return void
     */
    public function execute()
    {
        $post = $this->httpRequest->getPostValue();
        if ($post) {
            $cartId = $post['cartId'];
            $customVat = $post['custom_vat'];
            $quote = $this->quoteRepository->getActive($cartId);
            $quote->setData('custom_vat', $customVat);
            $this->quoteRepository->save($quote);
        }
    }
}
