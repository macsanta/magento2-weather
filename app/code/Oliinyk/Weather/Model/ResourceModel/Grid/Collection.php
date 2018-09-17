<?php

namespace Oliinyk\Weather\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */

    protected function _construct()
    {
        $this->_init(
            'Oliinyk\Weather\Model\Grid',
            'Oliinyk\Weather\Model\ResourceModel\Grid'
        );
    }
}
