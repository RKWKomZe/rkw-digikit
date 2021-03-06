<?php

namespace Bm\RkwDigiKit\Domain\Model;

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
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Tutorial
 * @package Bm\RkwDigiKit\Domain\Model
 */
class Tutorial extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $introText = '';

    /**
     * @var string
     */
    protected $introTextMobile = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bm\RkwDigiKit\Domain\Model\FileReference>
     */
    protected $media = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bm\RkwDigiKit\Domain\Model\FileReference>
     */
    protected $mediaMobile = null;

    /**
     * Tutorial constructor.
     */
    public function __construct()
    {
        $this->media = new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getIntroText()
    {
        return $this->introText;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getIntroTextMobile()
    {
        return $this->introTextMobile;
    }

    /**
     * @param string $introTextMobile
     */
    public function setIntroTextMobile(string $introTextMobile)
    {
        $this->introTextMobile = $introTextMobile;
    }

    /**
     * @return ObjectStorage
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param ObjectStorage $media
     */
    public function setMedia(ObjectStorage $media)
    {
        $this->media = $media;
    }

    /**
     * @param \Bm\RkwDigiKit\Domain\Model\FileReference $mediaToAdd
     */
    public function addMedia(\Bm\RkwDigiKit\Domain\Model\FileReference $mediaToAdd)
    {
        $this->media->attach($mediaToAdd);
    }

    /**
     * @param \Bm\RkwDigiKit\Domain\Model\FileReference $mediaToRemove
     */
    public function removeMedia(\Bm\RkwDigiKit\Domain\Model\FileReference $mediaToRemove)
    {
        $this->media->detach($mediaToRemove);
    }

    /**
     * @return ObjectStorage
     */
    public function getMediaMobile()
    {
        return $this->mediaMobile;
    }

    /**
     * @param ObjectStorage $mediaMobile
     */
    public function setMediaMobile(ObjectStorage $mediaMobile)
    {
        $this->mediaMobile = $mediaMobile;
    }

    /**
     * @param \Bm\RkwDigiKit\Domain\Model\FileReference $mediaMobileToAdd
     */
    public function addMediaMobile(\Bm\RkwDigiKit\Domain\Model\FileReference $mediaMobileToAdd)
    {
        $this->mediaMobile->attach($mediaMobileToAdd);
    }

    /**
     * @param \Bm\RkwDigiKit\Domain\Model\FileReference $mediaMobileToRemove
     */
    public function removeMediaMobile(\Bm\RkwDigiKit\Domain\Model\FileReference $mediaMobileToRemove)
    {
        $this->mediaMobile->detach($mediaMobileToRemove);
    }
}