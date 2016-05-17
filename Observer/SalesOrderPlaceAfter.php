<?php
namespace Excellence\Event\Observer;
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface; 
class SalesOrderPlaceAfter implements ObserverInterface
{
    
    protected $logger;
    protected $_storeinfoFactory;
    protected $_storeTime;
    protected $orderFactory;
    public function __construct(LoggerInterface $logger,\Excellence\Event\Model\StoreInfoFactory $storeinfoFactory,
                                \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
                                 \Magento\Sales\Model\OrderFactory $orderFactory
    )
    {
        $this->logger = $logger;
        $this->_storeinfoFactory = $storeinfoFactory;
        $this->_orderFactory = $orderFactory;
        $this->_storeTime = $timezone;
    }
 
    public function execute(Observer $observer)
    {
       $model = $this->_storeinfoFactory->create();
       $fetchStatus= $this->_orderFactory->create();
       $event = $observer->getEvent();
       $orderIds = $event->getOrderIds();
       $order_id = $orderIds[0];
       $customerStatus = $fetchStatus->load($order_id);
       $status= $customerStatus->getStatus();
       $time = (new \DateTime())->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT);
       $model->saveEntry($order_id, $status, $time);
    }
}
