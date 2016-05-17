<?php
namespace Excellence\Event\Model\ResourceModel;
class StoreInfo extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_event_storeinfo','excellence_event_storeinfo_id');
    }
}
