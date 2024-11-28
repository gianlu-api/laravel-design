<?php declare(strict_types=1);

namespace gianluApi\laravelDesign\Exceptions;

use Exception;

class GeneratorTypeException extends Exception
{

    /**
     * @throws GeneratorTypeException
     */
    public static function InvalidType(): void
    {
        throw new self("Invalid generator type", 1);
    }

}
