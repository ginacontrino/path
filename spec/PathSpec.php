<?php

namespace spec\ginacontrino;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PathSpec extends ObjectBehavior
{
    function it_should_connect_2_strings()
    {
        $this->join(['/path/to/my/','file.ext'])->shouldReturn('/path/to/my/file.ext');
    }

    function it_should_connect_2_strings_and_handle_relatives()
    {
        $this->join(['/path/to/my/','./../file.ext'])->shouldReturn('/path/to/file.ext');
        $this->join(['/path/to/../my/','./../file.ext'])->shouldReturn('/path/file.ext');
    }

}
