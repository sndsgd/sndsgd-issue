<?php

namespace sndsgd;


/**
 * A base class for types of issues
 */
abstract class Issue
{
   /**
    * A message describing the issue
    *
    * @var string
    */
   protected $message;

   /**
    * Data relevant to the issue
    * 
    * @var array|null
    */
   protected $data = null;

   /**
    * Create a new issue
    *
    * @param string $message A human readable description of the issue
    * @param array|null $data Information relevant to the issue
    */
   public function __construct($message, $data = null)
   {
      $this->message = $message;
      if ($data !== null) {
         $this->setData($data);
      }
   }

   /**
    * Get the issue message
    *
    * @return string
    */
   public function getMessage()
   {
      return $this->message;
   }

   /**
    * Set the issue data
    *
    * @param array.<string,mixed> $data
    */
   public function setData(array $data)
   {
      $this->data = $data;
   }

   /**
    * Add data to the issue
    *
    * @param string $key
    * @param mixed $value
    */
   public function addData($key, $value)
   {
      $this->data[$key] = $value;
   }

   /**
    * Get the issue data
    *
    * @return array|null
    */
   public function getData()
   {
      return $this->data;
   }
}

