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

namespace Umc\Sample\Model\ResourceModel\Something;

use Umc\Crud\Model\ResourceModel\Collection\StoreAwareAbstractCollection;
use Umc\Sample\Model\Something;

class Collection extends StoreAwareAbstractCollection
{
    /**
     * @var string
     * phpcs:disable PSR2.Classes.PropertyDeclaration.Underscore,PSR12.Classes.PropertyDeclaration.Underscore
     */
    protected $_idFieldName = 'something_id';
    //phpcs:enable

    /**
     * @return void
     * @codeCoverageIgnore
     * phpcs:disable PSR2.Methods.MethodDeclaration.Underscore,PSR12.Methods.MethodDeclaration.Underscore
     */
    protected function _construct()
    {
        $this->_init(Something::class, \Umc\Sample\Model\ResourceModel\Something::class);
        $this->_map['fields']['store_id'] = 'store_table.store_id';
        $this->_map['fields']['something_id'] = 'main_table.something_id';
    }
    //phpcs:enable
}
