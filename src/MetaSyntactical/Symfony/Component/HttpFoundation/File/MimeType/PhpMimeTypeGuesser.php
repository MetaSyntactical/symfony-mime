<?php

namespace MetaSyntactical\Symfony\Component\HttpFoundation\File\MimeType;

use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesserInterface;
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
    /**
     * Returns whether this guesser is supported on the current OS/PHP setup
     *
     * @return Boolean
     */
    public static function isSupported()
    {
        return class_exists('MetaSyntactical\\Mime\\Magic');
    }

    /**
     * {@inheritdoc}
     */
    public function guess($path)
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

