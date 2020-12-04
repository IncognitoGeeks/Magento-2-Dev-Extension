<?php
/**
 * Enable/Disable TPH
 *
 */
declare(strict_types=1);

namespace IncognitoGeeks\ChromeExt\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Cache\Manager;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;

class Enabletph implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $_pageFactory;

    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;

    /**
     * @var Manager
     */
    private $cacheManager;

    /**
     * @var ForwardFactory
     */
    private $forwardFactory;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var WriterInterface
     */
    private $configWriter;

    /**
     * Enabletph constructor.
     * @param PageFactory $pageFactory
     * @param JsonFactory $resultJsonFactory
     * @param Manager $cacheManager
     * @param ForwardFactory $forwardFactory
     * @param RequestInterface $request
     * @param WriterInterface $configWriter
     */
    public function __construct(
        PageFactory $pageFactory,
        JsonFactory $resultJsonFactory,
        Manager $cacheManager,
        ForwardFactory $forwardFactory,
        RequestInterface $request,
        WriterInterface $configWriter
    ) {
        $this->_pageFactory = $pageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->cacheManager = $cacheManager;
        $this->forwardFactory = $forwardFactory;
        $this->request = $request;
        $this->configWriter = $configWriter;
    }

    /**
     * @return Forward|Json
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();

        if (true) {
            $enable = (int)$this->request->getParam('enable');
            if ($enable === 1) {
                $this->configWriter->save('dev/debug/template_hints_storefront', 1);
            } else {
                $this->configWriter->save('dev/debug/template_hints_storefront', 0);
            }
            $this->cacheManager->flush($this->cacheManager->getAvailableTypes());
            $response [] =
                    [
                        'code' => "200",
                        'message' => 'success'
                    ];

            return $result->setData($response);
        } else {
            //redirect
            $forward = $this->forwardFactory->create();
            return $forward->forward('defaultNoRoute');
        }
    }
}
