<?php

namespace sndsgd;

use sndsgd\issue\Error;
use sndsgd\issue\Warning;


class IssueTest extends \PHPUnit_Framework_TestCase
{
   public function testError()
   {
      $msg = 'test error';
      $data = null;
      $issue = new Error($msg, $data);
      $this->assertEquals($msg, $issue->getMessage());
      $this->assertNull($issue->getData());

      $issue->addData('key', 'value');
      $this->assertEquals(['key' => 'value'], $issue->getData());

      $data = ['one' => 1, 'two' => '2'];
      $issue = new Error($msg, $data);
      $this->assertEquals($msg, $issue->getMessage());
      $this->assertEquals($data, $issue->getData());
   }

   public function testWarning()
   {
      $msg = 'test warning';
      $data = null;
      $issue = new Warning($msg, $data);
      $this->assertEquals($msg, $issue->getMessage());
      $this->assertNull($issue->getData());

      $issue->addData('key', 'value');
      $this->assertEquals(['key' => 'value'], $issue->getData());

      $data = ['one' => 1, 'two' => '2'];
      $issue = new Warning($msg, $data);
      $this->assertEquals($msg, $issue->getMessage());
      $this->assertEquals($data, $issue->getData());
   }
}

