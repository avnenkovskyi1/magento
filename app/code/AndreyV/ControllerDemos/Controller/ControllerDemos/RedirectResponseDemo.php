<?php
declare(strict_types=1);

namespace AndreyV\ControllerDemos\Controller\ControllerDemos;

use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\Result\Redirect;

/**
 * Class RedirectResponseDemo
 */
class RedirectResponseDemo
    implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    private \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory;

    /**
     * @param RedirectFactory $redirectFactory
     */
    public function __construct(
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory
    ) {
        $this->redirectFactory = $redirectFactory;
    }

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        return $this->redirectFactory->create()->setUrl('https://github.com/avnenkovskyi1/magento');
    }
}
