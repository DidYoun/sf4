<?php

namespace spec\Slab\Component\Security\Entity;

use Slab\Component\Security\Entity\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }

    function it_should_return_a_username()
    {
        $this->setUsername('john');
        $this->getUsername()->shouldReturn('john');
    }
}
