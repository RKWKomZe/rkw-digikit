<?php

namespace Bm\RkwDigiKit\Service;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2019 Bastian Behr <digital@dcc.ruhr>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Class AbstractService
 * @package Bm\RkwDigiKit\Service
 */
abstract class AbstractService implements SingletonInterface
{
    /**
     * @var null|object|ObjectManager
     */
    protected $objectManager = null;

    /**
     * @var array
     */
    protected $settings = [];

    /**
     * AbstractService constructor.
     */
    public function __construct()
    {
        /** @var ObjectManager objectManager */
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);

        $this->settings = $this->objectManager->get(ConfigurationManagerInterface::class)
            ->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,'rkwDigiKit');
    }
}