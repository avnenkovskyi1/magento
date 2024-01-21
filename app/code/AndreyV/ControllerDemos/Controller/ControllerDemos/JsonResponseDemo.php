<?php
declare(strict_types=1);

namespace AndreyV\ControllerDemos\Controller\ControllerDemos;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\Json;

/**
 * Class JsonResponseDemo
 */
class JsonResponseDemo
    implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    private \Magento\Framework\App\RequestInterface $request;
    private JsonFactory $jsonFactory;

    /**
     * @param RequestInterface $request
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        $this->request = $request;
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * @return Json
     */
    public function execute(): Json
    {
        return $this->jsonFactory->create()
            ->setHeader('Content-Type','application/json')
            ->setData([
                'first_param' => $this->request->getParam('first_param', ''),
                'second_param' => $this->request->getParam('second_param', '')
            ]);
    }
}
