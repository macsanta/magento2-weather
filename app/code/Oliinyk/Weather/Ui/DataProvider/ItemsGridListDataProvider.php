<?php

namespace Oliinyk\Weather\Ui\DataProvider;

use \Magento\Ui\DataProvider\AbstractDataProvider;
use \Oliinyk\Weather\Model\ResourceModel\Grid\Collection;

class ItemsGridListDataProvider extends AbstractDataProvider
{
  public function __construct(
    $name,
    $primaryFieldName,
    $requestFieldName,
    Collection $itemsCollection,
    array $meta = [],
    array $data = []
  ) {
    
    $this->collection = $itemsCollection;
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

}