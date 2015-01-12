<?php

namespace sndsgd\issue;


class TestManager
{
   use Manager;
}


class ManagerTest extends \PHPUnit_Framework_TestCase
{
   public function setUp()
   {
      $this->manager = new TestManager;
   }

   public function tearDown()
   {
      $this->manager = null;
   }

   public function testHasIssues()
   {
      $this->assertFalse($this->manager->hasIssues());
      $this->manager->addIssue(new Error('test'));
      $this->assertTrue($this->manager->hasIssues());
   }

   public function testAddIssue()
   {
      $this->manager->addIssue(new Error('test'));
      $this->manager->addIssue(new Warning('test'));

      $issues = $this->manager->getIssues();
      $this->assertEquals(2, count($issues));
      $this->assertTrue($issues[0] instanceof Error);
      $this->assertTrue($issues[1] instanceof Warning);
   }

   public function testAddGetError()
   {
      $msg = 'test error';
      $data = ['key' => 'value'];
      $this->manager->addError($msg, $data);
      $issues = $this->manager->getErrors();
      $this->assertTrue($issues[0] instanceof Error);
   }

   public function testAddGetWarning()
   {
      $msg = 'test warning';
      $data = ['key' => 'value'];
      $this->manager->addWarning($msg, $data);
      $issues = $this->manager->getWarnings();
      $this->assertTrue($issues[0] instanceof Warning);
   }
}

