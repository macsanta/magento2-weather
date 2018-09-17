<?php

namespace Oliinyk\Weather\Ui\DataProvider;

use \Magento\Ui\DataProvider\AbstractDataProvider;
use \Oliinyk\Weather\Model\ResourceModel\Grid\Collection;
use Magento\Framework\App\RequestInterface;

class ItemsGridSubListDataProvider extends AbstractDataProvider
{
  public function __construct(
    RequestInterface $request,
    \Magento\Catalog\Model\Session $catalogSession,
    \Magento\Framework\Registry $coreRegistry,
    $name,
    $primaryFieldName,
    $requestFieldName,
    Collection $itemsCollection,
    array $meta = [],
    array $data = []
  ) {
    
    $this->collection = $itemsCollection;
    $this->_request = $request;
    $this->_coreRegistry = $coreRegistry;
    $this->_catalogSession = $catalogSession;
    parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
  }


  public function getData()
  {
    $collectionItems = $this->getCollection();

    $result = [];
    $result['items'] = $collectionItems->getData();
    $result['totalRecords'] = $collectionItems->getSize();

    return $result;

  }

  public function _prepareLayout()
  {
      return parent::_prepareLayout();
  }

  public function getCatalogSession() 
  {
      return $this->_catalogSession;
  }

}