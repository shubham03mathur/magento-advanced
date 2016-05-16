<?php
namespace Excellence\Event\Model\ResourceModel;
class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_event_test','excellence_event_test_id');
    }
}
