<?php
declare(strict_types=1);

namespace Denal05\Ad0e702ExerciseEavCollection\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ProductRenderer implements ArgumentInterface
{
    /**
     * Product collection factory
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    /**
     * @param CollectionFactory $productCollectionFactory
     */
    public function __construct(
        CollectionFactory $productCollectionFactory
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
    }

    public function getProductCollection(): ? \Magento\Catalog\Model\ResourceModel\Product\Collection
    {
        try {
            $productCollection = $this->_productCollectionFactory->create();
            $productCollection->addAttributeToFilter(['name', 'url_key']);
            $productCollection->addFieldToFilter('type_id', \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE);
            return $productCollection;
        } catch (\Exception $exception) {
            return null;
        }
    }
}
