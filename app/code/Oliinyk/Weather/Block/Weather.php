<?php
namespace Oliinyk\Weather\Block;

class Weather extends \Magento\Framework\View\Element\Template
{
    protected $_weatherFactory;
    
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Oliinyk\Weather\Model\Grid $weatherFactory
	)
	{
		$this->_weatherFactory = $weatherFactory;
		parent::__construct($context);
    }
    
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getWeatherItems()
    {
        $collectionItems = $this->getWeatherCollection();

       return $collectionItems;
    }

	public function getWeatherCollection(){
		$weather = $this->_weatherFactory->getCollection();
		return $weather;
	}
}