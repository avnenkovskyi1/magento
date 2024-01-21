<?php
declare(strict_types=1);

namespace AndreyV\ControllerDemos\Controller\ControllerDemos;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class RawResponseDemo
 */
class RawResponseDemo
    implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    /**
     * @var RequestInterface $request
     */
    private RequestInterface $request;
    private \Magento\Framework\Controller\Result\RawFactory $rawFactory;

    /**
     * @param RequestInterface $request
     * @param RawFactory $rawFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Controller\Result\RawFactory $rawFactory
    ) {

        $this->request = $request;
        $this->rawFactory = $rawFactory;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        /** @var Raw $result */
        $result = $this->rawFactory->create();

        $html = <<<HTML
            <ol>
                <li style="margin-top: 20px">
                    <a href="redirectresponsedemo" target="_blank">RedirectResponseDemo</a>
                </li>
                <li style="margin-top: 20px">
                    <form action="/andreyv-controllerdemos/controllerdemos/jsonresponsedemo" method="GET" target="_blank">
                        <fieldset>
                            <legend>JsonResponseDemo</legend>
                            <label for="first_param">First param:</label><br>
                            <input type="text" id="first_param" name="first_param" value="AndreyV"><br>
                            <label for="second_param">Second param:</label><br>
                            <input type="text" id="second_param" name="second_param" value="ControllerDemos"><br><br>
                            <input type="submit" value="Submit">
                        </fieldset>
                    </form>
                </li>
                <li style="margin-top: 20px">
                    <a href="forwardresponsedemo" target="_blank">ForwardResponseDemo</a>
                </li>
            </ol>
        HTML;


        return $result->setHeader('Content-Type','text/html')
            ->setContents($html);
    }
}
