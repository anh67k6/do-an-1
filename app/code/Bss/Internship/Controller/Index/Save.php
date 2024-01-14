<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Controller\Index;

use Bss\Internship\Model\InternshipFactory;
use Bss\Internship\Model\InternshipRepository;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;

/*
 * @Copyright
 */

class Save implements HttpPostActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var InternshipFactory
     */
    protected $internshipFactory;
    /**
     * @var Http
     */
    protected $internshipResource;
    /**
     * @var Http
     */
    protected $httpRequest;
    /**
     * @var ManagerInterface
     */
    protected $messageManager;
    /**
     * @var ResultFactory
     */
    protected $resultFactory;
    /**
     * @var InternshipRepository
     */
    protected $internshipRepository;

    /**
     * @param ResultFactory $resultFactory
     * @param PageFactory $resultPageFactory
     * @param InternshipFactory $internshipFactory
     * @param Http $httpRequest
     * @param InternshipRepository $internshipRepository
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        ResultFactory $resultFactory,
        PageFactory       $resultPageFactory,
        InternshipFactory $internshipFactory,
        Http $httpRequest,
        InternshipRepository $internshipRepository,
        ManagerInterface $messageManager,
    ) {
        $this->resultFactory = $resultFactory;
        $this->internshipFactory = $internshipFactory;
        $this->internshipRepository = $internshipRepository;
        $this->resultPageFactory = $resultPageFactory;
        $this->httpRequest = $httpRequest;
        $this->messageManager = $messageManager;
    }

    /**
     * Get data and save to internship table
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->httpRequest->getPostValue();
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        if (isset($data['full_name'])
            && isset($data["date_of_birth"])
            && isset($data["gender"])
            && isset($data["address"])
            && isset($data["email"])) {
            $internship = $this->internshipFactory->create();
            $internship->setData($data);
            $this->internshipRepository->save($internship);
            $this->messageManager->addSuccessMessage(__('Your data has been saved!'));
        } else {
            $this->messageManager->addErrorMessage(__('There was an error
                while saving Internship data, please try again!.'));
        }
        $resultRedirect->setUrl('/');
        return $resultRedirect;
    }
}
