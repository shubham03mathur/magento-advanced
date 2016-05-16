<?php
namespace Excellence\Event\Model\ResourceModel\Test;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Excellence\Event\Model\Test','Excellence\Event\Model\ResourceModel\Test');
    }
}
