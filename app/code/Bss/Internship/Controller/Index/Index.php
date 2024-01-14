<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;

/*
 * @Copyright
 */

class Index implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var ManagerInterface
     */
    protected $messageManager;
    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * @param ResultFactory $resultFactory
     * @param PageFactory $resultPageFactory
     * @param ScopeConfigInterface $scopeConfig
     * @param ManagerInterface $messageManager
     */

    public function __construct(
        ResultFactory $resultFactory,
        PageFactory $resultPageFactory,
        ScopeConfigInterface $scopeConfig,
        ManagerInterface $messageManager,
    ) {
        $this->resultFactory = $resultFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->scopeConfig = $scopeConfig;
        $this->messageManager = $messageManager;
    }

    /**
     * Prints the information
     *
     * @return Page
     */
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $enableForm = $this->scopeConfig->getValue('internship/general/enable_form');
        if ($enableForm == '0') {
            $resultRedirect->setUrl('/');
            $this->messageManager->addErrorMessage(__('You do not have enough permissions to access this page,
                please contact the administrator!'));
            return $resultRedirect;
        }
        return $this->resultPageFactory->create();
    }
}
