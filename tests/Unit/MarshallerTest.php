<?php

namespace Jeidison\Tests\Unit;

use DateTime;
use Jeidison\PAXB\PAXB;
use Jeidison\Tests\Resources\Beans\Address;
use Jeidison\Tests\Resources\Beans\Author;
use Jeidison\Tests\Resources\Beans\Book;
use Jeidison\Tests\TestCase;

class MarshallerTest extends TestCase
{
    public function testMarshal()
    {
        $address = new Address();
        $address->setAddress("Rua 10");
        $address->setNumber("123");
        $address->setId("123");

        $author = new Author();
        $author->setName("Jeidison Farias");
        $author->setBirthday("");
        $author->setEmail("");
        $author->setAddress($address);

        $book = new Book();
        $book->setId(1);
        $book->setName("PHP XML Binding");
        $book->setAuthor($author);
        $book->setDate(new DateTime());

        $marshaller = PAXB::createMarshaller();
        $marshaller->setFormatOutput(true);
        $xml  = $marshaller->marshal($book);

        $this->assertNotNull($xml);
    }

}