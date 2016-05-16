<?php
namespace Excellence\Event\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        return parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
     
    public function execute()
    {
        echo __METHOD__;
        exit;
    } 
}
