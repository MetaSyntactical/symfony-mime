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
        return class_exists('MetaSyntactical\\Mime\\Magic');
    }

    public function guessMimeType(string $path): ?string
    {
        if (!is_file($path)) {
            throw new FileNotFoundException($path);
        }

        if (!is_readable($path)) {
            // @codeCoverageIgnoreStart
            throw new AccessDeniedException($path);
        }
        // @codeCoverageIgnoreEnd

        if (!self::isSupported()) {
            // @codeCoverageIgnoreStart
            return null;
        }
        // @codeCoverageIgnoreEnd

        if (!$magic = new Magic()) {
            // @codeCoverageIgnoreStart
            return null;
        }
        // @codeCoverageIgnoreEnd

        return $magic->getMimeType($path);
    }
}

