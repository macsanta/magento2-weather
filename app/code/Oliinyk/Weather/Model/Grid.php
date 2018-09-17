<?php

namespace Oliinyk\Weather\Model;


class Grid extends \Magento\Framework\Model\AbstractModel
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'weather_items';

    /**
     * @var string
     */
    protected $_cacheTag = 'weather_items';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'weather_items';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Oliinyk\Weather\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }


    /**
     * Set Content.
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function getChilds($entityId)
    {
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get City ID.
     *
     * @return varchar
     */
    public function getCityID()
    {
        return $this->getData(self::CITY_ID);
    }

    /**
     * Set CityID.
     */
    public function setCityID($cityID)
    {
        return $this->setData(self::CITY_ID, $cityID);
    }

    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }


    /**
     * Get getTemperature.
     *
     * @return varchar
     */
    public function getTemperature()
    {
        return $this->getData(self::TEMP);
    }

    /**
     * Set Content.
     */
    public function setTemperature($temperature)
    {
        return $this->setData(self::TEMP, $temperature);
    }

    /**
     * Get PublishDate.
     *
     * @return varchar
     */
    public function getPublishDate()
    {
        return $this->getData(self::PUBLISH_DATE);
    }

    /**
     * Set PublishDate.
     */
    public function setPublishDate($publishDate)
    {
        return $this->setData(self::PUBLISH_DATE, $publishDate);
    }



    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
