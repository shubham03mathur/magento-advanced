<?php
namespace Excellence\Event\Api;

use Excellence\Event\Model\StoreInfoInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface StoreInfoRepositoryInterface 
{
    public function save(StoreInfoInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(StoreInfoInterface $page);

    public function deleteById($id);
}
