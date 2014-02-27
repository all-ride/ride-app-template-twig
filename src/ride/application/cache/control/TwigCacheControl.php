<?php

namespace ride\application\cache\control;

use ride\library\template\engine\TwigEngine;
use ride\library\system\file\FileSystem;

/**
 * Cache control implementation for Twig
 */
class TwigCacheControl extends AbstractCacheControl {

    /**
     * Name of this control
     * @var string
     */
    const NAME = 'twig';

    /**
     * Instance of the Twig template engine
     * @var ride\library\template\engine\TwigEngine
     */
    private $engine;

    /**
     * Instance of the file system
     * @var ride\library\system\file\FileSystem
     */
    private $fileSystem;

    /**
     * Constructs a new twig cache control
     * @param ride\library\template\engine\TwigEngine $engine
     * @param ride\library\system\file\FileSystem $fileSystem
     * @return null
     */
    public function __construct(TwigEngine $engine, FileSystem $fileSystem) {
        $this->engine = $engine;
        $this->fileSystem = $fileSystem;
    }

    /**
     * Gets whether this cache is enabled
     * @return boolean
     */
    public function isEnabled() {
        return true;
    }

    /**
	 * Clears this cache
	 * @return null
     */
    public function clear() {
        $directory = $this->fileSystem->getFile($this->engine->getTwig()->getCache());
        if ($directory->exists()) {
            $directory->delete();
        }
    }

}