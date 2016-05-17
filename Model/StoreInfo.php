<?php
namespace Excellence\Event\Model;
class StoreInfo extends \Magento\Framework\Model\AbstractModel implements StoreInfoInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'excellence_event_storeinfo';

    protected function _construct()
    {
        $this->_init('Excellence\Event\Model\ResourceModel\StoreInfo');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function saveEntry($order_id,$status,$time)
    { 
    	
        $this->setOrderId($order_id);
        $this->setStatus($status);
        $this->setCreationTime($time);
        $this->save();
    }
}
