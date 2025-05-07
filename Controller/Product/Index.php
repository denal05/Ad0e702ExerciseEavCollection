<?php
declare(strict_types=1);

namespace Denal05\Ad0e702ExerciseEavCollection\Controller\Product;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    private PageFactory $pageFactory;
    protected Context $context;

    public function __construct(
        PageFactory $pageFactory,
        Context $context,
    ) {
        $this->pageFactory = $pageFactory;
        $this->context = $context;
    }

    public function execute(): Page
    {
        return $this->pageFactory->create();
    }
}
