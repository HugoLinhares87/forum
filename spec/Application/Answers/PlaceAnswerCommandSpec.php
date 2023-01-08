<?php

namespace spec\App\Application\Answers;

use App\Application\Answers\PlaceAnswerCommand;
use App\Application\Command;
use App\Domain\UserManagement\User\UserId;
use PhpSpec\ObjectBehavior;

class PlaceAnswerCommandSpec extends ObjectBehavior
{

    private $ownerUserId;
    private $body;

    function let()
    {
        $this->ownerUserId = new UserId();
        $this->body = 'Some text as body...';
        $this->beConstructedWith(
            $this->ownerUserId,
            $this->body
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PlaceAnswerCommand::class);
    }

    function its_a_command()
    {
        $this->shouldBeAnInstanceOf(Command::class);
    }

    function it_has_a_ownerUserId()
    {
        $this->ownerUserId()->shouldBe($this->ownerUserId);
    }


    function it_has_a_body()
    {
        $this->body()->shouldBe($this->body);
    }
}
