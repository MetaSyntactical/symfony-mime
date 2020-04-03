<?php

namespace MetaSyntactical\Symfony\Component\HttpFoundation\File\MimeType;

use Symfony\Component\Mime\MimeTypeGuesserInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

use MetaSyntactical\Mime\Magic;

/**
 * Guesses the mime type using the MetaSyntactical/Mime component
 *
 * @author Daniel Kreuer <dk@metasyntactical.com>
 */
class PhpMimeTypeGuesser implements MimeTypeGuesserInterface
{
    public function isGuesserSupported(): bool
    {
        return class_exists(Magic::class);
    }

    public function guessMimeType(string $path): ?string
    {
        if (!is_file($path) || !is_readable($path)) {
            throw new InvalidArgumentException(sprintf('The "%s" file does not exist or is not readable.', $path));
        }

        if (!$this->isGuesserSupported()) {
            throw new LogicException(sprintf('The "%s" guesser is not supported.', __CLASS__));
        }

        return (new Magic())->getMimeType($path);
    }
}

