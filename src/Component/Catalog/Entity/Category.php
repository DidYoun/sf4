<?php

namespace Slab\Component\Catalog\Entity;

/**
 * Class Category
 *
 * @package     Slab\Component\Catalog\Entity
 * @author      Didier Youn <didier.youn@gmail.com>
 * @copyright   Copyright (c) 2018 Slabprea
 */
class Category
{

    /** @var int */
    protected $id;

    /** @var string */
    protected $label;

    /** @var string */
    protected $thumbnail;

    /** @var bool */
    protected $isActive;
}