<?php

namespace App\Application\Answers;

use App\Application\Command;
use App\Domain\UserManagement\User\UserId;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\AsResourceObject;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\Attribute;
use App\Infrastructure\JsonApi\SchemaDiscovery\Attributes\RelationshipIdentifier;

/**
 * PlaceAnswerCommand
 *
 * @package App\Application\Answer
 */
#[AsResourceObject(type: "Answer")]
class PlaceAnswerCommand implements Command
{
    /**
     * Creates a PlaceAnswerCommand
     *
     * @param UserId $ownerUserId
     * @param string $body
     */
    public function __construct(
        #[RelationshipIdentifier(name: "owner", className: UserId::class, type: 'users')]
        private readonly UserId $ownerUserId,


        #[Attribute(required: true)]
        private readonly string $body
    ) {
    }

    /**
     * ownerUserId
     *
     * @return UserId
     */
    public function ownerUserId(): UserId
    {
        return $this->ownerUserId;
    }


    /**
     * body
     *
     * @return string
     */
    public function body(): string
    {
        return $this->body;
    }
}
