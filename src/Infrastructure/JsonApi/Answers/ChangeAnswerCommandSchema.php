<?php

/**
 * This file is part of forum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Infrastructure\JsonApi\Answers;

use App\Application\Answers\ChangeAnswerCommand;
use App\Domain\Answers\Answer\AnswerId;
use Ramsey\Uuid\Uuid;
use Slick\JSONAPI\Object\AbstractResourceSchema;
use Slick\JSONAPI\Object\ResourceSchema;

/**
 * CreateAnswerAnswerCommandSchema
 *
 * @package App\Infrastructure\JsonApi\Answers
 */
final class ChangeAnswerCommandSchema extends AbstractResourceSchema implements ResourceSchema
{

    /**
     * @inheritDoc
     */
    public function type($object): string
    {
        return 'Answers';
    }

    /**
     * @inheritDoc
     */
    public function identifier($object): ?string
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * @inheritDoc
     */
    public function from($resourceObject): ChangeAnswerCommand
    {
        $AnswerId = new AnswerId($resourceObject->resourceIdentifier()->identifier());
        $attributes = (object) $resourceObject->attributes();
        return new ChangeAnswerCommand(
            $AnswerId,
            $attributes->body ?: null
        );
    }


}