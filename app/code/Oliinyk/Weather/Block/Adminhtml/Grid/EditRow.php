<?php

namespace Oliinyk\Weather\Block\Adminhtml\Grid;

class EditRow extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry.
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry           $registry
     * @param array                                 $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize Imagegallery Images Edit Block.
     */
    protected function _construct()
    {
        $this->_objectId = 'row_id';
        $this->_blockGroup = 'Oliinyk_Weather';
        $this->_controller = 'adminhtml_grid';

        $this->addButton(
            'add',
            [
                'label' => __('Dodaj nowe podmenu'),
                'onclick' => 'setLocation('. $this->getUrl('weather/grid/addrow').')',
                'class' => 'primary'
            ],
            10
        );

        parent::_construct();
        if ($this->_isAllowedAction('Oliinyk_Weather::edit_row')) {
            $this->buttonList->update('save', 'label', __('Save'));

        } else {
            $this->buttonList->remove('save');
        }
        $this->buttonList->remove('reset');
    }

    public function getParentId()
    {
        return $this->_coreRegistry->registry('row_data')->getData('entity_id');
    }

    /**
     * Retrieve text for header element depending on loaded image.
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        return __('Edit Menu Item');
    }
    

    /**
     * Check permission for passed action.
     *
     * @param string $resourceId
     *
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Get form action URL.
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        if ($this->hasFormActionUrl()) {
            return $this->getData('form_action_url');
        }

        return $this->getUrl('*/*/save');
    }
}
