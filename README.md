README
======

[![Build Status](https://secure.travis-ci.org/MetaSyntactical/symfony-mime.png?branch=master)](http://travis-ci.org/MetaSyntactical/symfony-mime)

What is MetaSyntactical/symfony-mime?
-----------------------------

MetaSyntactical/symfony-mime is a tie-in component to use the MetaSyntactical/Mime MIME type
detection in Symfony2 File Validation.

Requirements
------------

MetaSyntactical/symfony-mime is only supported on PHP 5.3.10 and up.

Installation
------------

The best way to install MetaSyntactical/symfony-mime is to use Composer (http://getcomposer.org).
Add the following part to your composer.json and run php composer.phar install`:

    {
        "require": {
            "metasyntactical/symfony-mime": "dev-master"
        }
    }

Documentation
-------------

It is easy to add MIME type detection to Symfony2 File Validation. Just use the following code
snippet (assuming you have installed MetaSyntactical/symfony-mime with composer):

    use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
    use MetaSyntactical\Symfony\Component\HttpFoundation\File\MimeType\PhpMimeTypeGuesser;

    MimeTypeGuesser::getInstance()->register(new PhpMimeTypeGuesser);

Afterwards the MetaSyntactical/Mime MIME type detection will be used in File's mimeType
validation.

Contributing
------------

COMING SOON
MetaSyntactical/symfony-mime is an open source project. If you'd like to contribute,
please read the [Contributing Code][1] part of the documentation. If you're
submitting a pull request, please follow the guidelines in the
[Submitting a Patch][2] section.

[1]: http://syntactical-sugar.com/doc/symfony-mime/current/contributing/code/index.html
[2]: http://syntactical-sugar.com/doc/symfony-mime/current/contributing/code/patches.html#check-list
