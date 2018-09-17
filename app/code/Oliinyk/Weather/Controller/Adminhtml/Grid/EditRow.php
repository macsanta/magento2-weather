<?php

namespace Oliinyk\Weather\Controller\Adminhtml\Grid;

use Magento\Framework\Controller\ResultFactory;

class EditRow extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @var \Oliinyk\Weather\Model\GridFactory
     */
    private $gridFactory;

    /**
     * @var \Oliinyk\Weather\Model\ResourceModel\Grid\CollectionFactory
     */
    // protected $collectionFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry,
     * @param \Oliinyk\Weather\Model\GridFactory $gridFactory
     * @param \Oliinyk\Weather\Model\ResourceModel\Grid\CollectionFactory $collectionFactory
     */

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Oliinyk\Weather\Model\GridFactory $gridFactory
        // \Oliinyk\Weather\Model\ResourceModel\Grid\Collection $collectionFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->gridFactory = $gridFactory;
        // $this->collectionFactory = $collectionFactory;
    }

    /**
     * Mapped Grid List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->gridFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();

            if (!$rowData->getEntityId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('weather/grid/rowdata');
                return;
            }
        }


        $this->coreRegistry->register('row_data', $rowData);
        // $_SESSION['adminnav_data_row_id'] = intval($this->coreRegistry->registry('row_data')->getData('entity_id'));
        // $this->coreRegistry->register('sub_data', ['test' => 1]);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Row Data ').$rowTitle : __('Add Row Data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Oliinyk_Weather::edit_row');
    }
}
