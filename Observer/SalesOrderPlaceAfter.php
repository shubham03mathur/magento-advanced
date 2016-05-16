<?php
namespace Excellence\Event\Observer;
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
 
 
class SalesOrderPlaceAfter implements ObserverInterface
{
    
    protected $logger;
    protected $_testFactory;
 
   
    public function __construct(LoggerInterface $logger,\Excellence\Table\Model\TestFactory $testFactory)
    {
        $this->logger = $logger;
        $this->_testFactory = $testFactory;
    }
 
    public function execute(Observer $observer)
    {
       // $this->logger->warn('Observer Works for Sales Order!');
       $test = $this->_testFactory->create();
       $event = $observer->getEvent();
       $orderIds = $event->getOrderIds();
       $order_id = $orderIds[0]; 
       $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
       $orderStatus = $objectManager->create('Magento\Sales\Model\Order')->load($order_id);
       $status= $orderStatus->getStatus();
       $observer->$test->saveEntry($status, $order_id);
         

      
    }
}
