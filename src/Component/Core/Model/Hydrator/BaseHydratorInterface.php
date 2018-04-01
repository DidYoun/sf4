<?php

namespace Slab\Component\Core\Model\Hydrator;

/**
 * Class BaseHydratorInterface
 *
 * @package     Slab\Component\Core\Hydrator
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
interface BaseHydratorInterface
{
    public function hydrate(array $data);
}