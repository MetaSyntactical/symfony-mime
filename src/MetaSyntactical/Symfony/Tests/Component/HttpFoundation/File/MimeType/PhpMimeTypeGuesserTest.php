<?php

namespace MetaSyntactical\Symfony\Tests\Component\HttpFoundation\File\MimeType;

use MetaSyntactical\Symfony\Component\HttpFoundation\File\MimeType\PhpMimeTypeGuesser;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-08-29 at 21:22:39.
 */
class PhpMimeTypeGuesserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PhpMimeTypeGuesser
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new PhpMimeTypeGuesser;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers MetaSyntactical\Symfony\Component\HttpFoundation\File\MimeType\PhpMimeTypeGuesser::isSupported
     */
    public function testGuesserIsSupported()
    {
        self::assertTrue(PhpMimeTypeGuesser::isSupported());
    }

    /**
     * @covers MetaSyntactical\Symfony\Component\HttpFoundation\File\MimeType\PhpMimeTypeGuesser::guess
     */
    public function testGuessingMimeTypeReturnsExpectedType()
    {
        $guess = $this->object->guess(__DIR__ . '/_Data/Fireworks_Australia_Day_11_-_2_(Public_Domain).jpg');
        self::assertEquals('image/jpeg', $guess);
    }

    /**
     * @covers MetaSyntactical\Symfony\Component\HttpFoundation\File\MimeType\PhpMimeTypeGuesser::guess
     */
    public function testGuessingMimeTypeOfNonExistingFileResultsInException()
    {
        $this->setExpectedException(
            'Symfony\\Component\\HttpFoundation\\File\\Exception\\FileNotFoundException',
            'does not exist'
        );
        $this->object->guess(__DIR__ . '/_Data/NonExisting.jpg');
    }
}
