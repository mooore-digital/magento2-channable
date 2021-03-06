<?php
/**
 * Copyright © 2019 Magmodules.eu. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magmodules\Channable\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 *
 * @package Magmodules\Channable\Controller\Adminhtml\Item
 */
class Index extends Action
{

    /**
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * Index constructor.
     *
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage->setActiveMenu('Magmodules_Channable::general_item');
        $resultPage->getConfig()->getTitle()->prepend(__('Channable - Items'));
        $resultPage->addBreadcrumb(__('Channable'), __('Channable'));
        $resultPage->addBreadcrumb(__('Items'), __('Items'));
        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magmodules_Channable::general_item');
    }
}
