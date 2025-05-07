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

            /* The line below generates the following error:
               TypeError: Cannot access offset of type string on string in /var/www/ad0-e702/vendor/magento/module-eav/Model/Entity/Collection/AbstractCollection.php:395
               Stack trace:
               #0 /var/www/ad0-e702/vendor/magento/module-catalog/Model/ResourceModel/Product/Collection.php(1630): Magento\Eav\Model\Entity\Collection\AbstractCollection->addAttributeToFilter()
               #1 /var/www/ad0-e702/app/code/Denal05/Ad0e702ExerciseEavCollection/ViewModel/ProductRenderer.php(36): Magento\Catalog\Model\ResourceModel\Product\Collection->addAttributeToFilter()
               #2 /var/www/ad0-e702/app/code/Denal05/Ad0e702ExerciseEavCollection/view/frontend/templates/index.phtml(6): Denal05\Ad0e702ExerciseEavCollection\ViewModel\ProductRenderer->getProductCollection()
            */
            ////$productCollection->addAttributeToFilter(['name', 'url_key']);

            $productCollection->addFieldToFilter('type_id', \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE);
            // SQL: SELECT 'e'.* FROM 'catalog_product_entity' AS 'e' WHERE ('e'.'type_id' = 'simple')

            return $productCollection;
        } catch (\Exception $exception) {
            return null;
        }
    }
}
