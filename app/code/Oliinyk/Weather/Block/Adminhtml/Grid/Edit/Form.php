<?php

namespace Oliinyk\Weather\Block\Adminhtml\Grid\Edit;

use Magento\Framework\App\RequestInterface;
/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
     * @param \Oliinyk\Weather\Model\Status $options,
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Oliinyk\Weather\Model\Status $options,
        array $data = [],
        RequestInterface $request
    ) {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_request = $request;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {

        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');

        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('olweather_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Add Weather Item'), 'class' => 'fieldset-wide']
        );


        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'id' => 'title',
                'title' => __('Title'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'static_url',
            'text',
            [
                'name' => 'static_url',
                'label' => __('Static Url'),
                'id' => 'static_url',
                'title' => __('Static Url'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'is_active',
            'select',
            [
                'name' => 'is_active',
                'label' => __('Status'),
                'id' => 'is_active',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );

        
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
