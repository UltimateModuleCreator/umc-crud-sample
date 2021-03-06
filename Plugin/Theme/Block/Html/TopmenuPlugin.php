<?php

/**
 * Umc_Sample extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category  Umc
 * @package   Umc_Sample
 * @copyright 2020 Marius Strajeru
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @author    Marius Strajeru
 */

declare(strict_types=1);

namespace Umc\Sample\Plugin\Theme\Block\Html;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\DataObject;
use Magento\Theme\Block\Html\Topmenu;

class TopmenuPlugin
{
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var NodeFactory
     */
    private $nodeFactory;
    /**
     * @var array
     */
    private $nodeData;

    /**
     * TopmenuPlugin constructor.
     * @param RequestInterface $request
     * @param NodeFactory $nodeFactory
     * @param array $nodeData
     */
    public function __construct(
        RequestInterface $request,
        NodeFactory $nodeFactory,
        array $nodeData
    ) {
        $this->request = $request;
        $this->nodeFactory = $nodeFactory;
        $this->nodeData = $nodeData;
    }

    /**
     * @param Topmenu $subject
     * @param string $outermostClass
     * @param string $childrenWrapClass
     * @param int $limit
     * @SuppressWarnings("PMD.UnusedFormalParameter")
     */
    public function beforeGetHtml(
        Topmenu $subject,
        $outermostClass = '',
        $childrenWrapClass = '',
        $limit = 0
    ) {
        $menu = $subject->getMenu();
        foreach ($this->nodeData as $data) {
            $converted = $this->convertNodeData($data);
            if ($converted === null) {
                continue;
            }
            $menu->addChild(
                $this->nodeFactory->create([
                    'data' => $converted,
                    'idField' => 'id',
                    'tree' => $menu->getTree()
                ])
            );
        }
    }

    /**
     * @param $data
     * @return array|null
     */
    private function convertNodeData($data)
    {
        $currentHandle = $this->request->getFullActionName();
        if (!isset($data['name']) || !isset($data['id'])) {
            return null;
        }
        $activeHandles = $data['activeHandles'] ?? [];
        return [
            'name' => __($data['name'])->render(),
            'id' => $data['id'],
            // phpcs:disable Magento2.Functions.DiscouragedFunction
            'url' => isset($data['url']) && is_array($data['url']) && is_callable(array_values($data['url']))
                ? call_user_func(array_values($data['url']))
                : '#',
            //phpcs: enable
            'is_active' => in_array($currentHandle, $activeHandles)
        ];
    }

    /**
     * @param Topmenu $subject
     * @param array $result
     * @return array
     */
    public function afterGetCacheKeyInfo(Topmenu $subject, array $result)
    {
        $allHandles = array_reduce(
            $this->nodeData,
            function ($initial, $item) {
                return array_merge($initial, ($item['activeHandles'] ?? []));
            },
            []
        );
        $currentHandle = $this->request->getFullActionName();
        if (in_array($currentHandle, $allHandles)) {
            $result[] = $currentHandle;
        }
        return $result;
    }
}
