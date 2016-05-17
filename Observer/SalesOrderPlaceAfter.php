<?php
namespace Excellence\Event\Observer;
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface; 
class SalesOrderPlaceAfter implements ObserverInterface
{
    
    protected $logger;
    protected $_testFactory;
    protected $_storeTime;
 
   
    public function __construct(LoggerInterface $logger,\Excellence\Event\Model\TestFactory $testFactory,
                                \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
    )
    {
        $this->logger = $logger;
        $this->_testFactory = $testFactory;
        $this->_storeTime = $timezone;
    }
 
    public function execute(Observer $observer)
    {
       $test = $this->_testFactory->create();
       $event = $observer->getEvent();
       $orderIds = $event->getOrderIds();
       $order_id = $orderIds[0]; 
       $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
       $orderStatus = $objectManager->create('Magento\Sales\Model\Order')->load($order_id);
       $status= $orderStatus->getStatus();
       $time = (new \DateTime())->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT);
       $test->saveEntry($order_id, $status, $time);
    }
}
