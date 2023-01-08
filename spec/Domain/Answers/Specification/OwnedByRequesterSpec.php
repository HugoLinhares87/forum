<?php

namespace spec\App\Domain\Answers\Specification;

use App\Domain\Answers\Answer;
use App\Domain\Answers\Specification\OwnedByRequester;
use App\Domain\UserManagement\User;
use App\Domain\UserManagement\UserIdentifier;
use PhpSpec\ObjectBehavior;
use App\Domain\Answers\AnswerSpecification;



class OwnedByRequesterSpec extends ObjectBehavior
{

    function let(
        UserIdentifier $identifier,
        User $loggedInUser
    ) {
        $loggedInUser->userId()->willReturn(new User\UserId());
        $identifier->currentUser()->willReturn($loggedInUser);

        $this->beConstructedWith($identifier);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(OwnedByRequester::class);
    }

    function its_a_answers_specification()
    {
        $this->shouldBeAnInstanceOf(AnswerSpecification::class);
    }

    function it_is_satisfied_when_answers_owner_is_the_logged_in_user(
        Answer $answers,
        User $loggedInUser
    ) {
        $answers->owner()->willReturn($loggedInUser);
        $this->isSatisfiedBy($answers)->shouldBe(true);
    }

    function it_fails_when_owner_is_not_the_logged_in_user(
        Answer $answers,
        User $owner
    ) {
        $answers->owner()->willReturn($owner);
        $owner->userId()->willReturn(new User\UserId());
        $this->isSatisfiedBy($answers)->shouldBe(false);
    }
}

