<?php
namespace Excellence\Event\Model\ResourceModel\StoreInfo;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Excellence\Event\Model\StoreInfo','Excellence\Event\Model\ResourceModel\StoreInfo');
    }
}
