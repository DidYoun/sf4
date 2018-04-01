<?php

namespace Slab\Component\Core\Manager;

/**
 * Interface BaseManagerInterface
 *
 * @package     Slab\Component\Core\Manager
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
interface BaseManagerInterface
{
    public function save($entity = null);
    public function edit($entity = null);
    public function delete($entity = null);
}