<?php
declare(strict_types=1);

namespace AndreyV\ControllerDemos\Controller\ControllerDemos;

use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\Forward;

/**
 * Class ForwardResponseDemo
 */
class ForwardResponseDemo
    implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    private \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory;

    /**
     * @param ForwardFactory $forwardFactory
     */
    public function __construct(
        \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory
    ) {
        $this->forwardFactory = $forwardFactory;
    }

    /**
     * @return Forward
     */
    public function execute(): Forward
    {
        return $this->forwardFactory->create()
            ->setModule('andreyv_controllerdemos')
            ->forward('jsonresponsedemo');
    }
}
