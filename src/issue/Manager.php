<?php

namespace sndsgd\issue;

use \sndsgd\Issue;


/**
 * A trait for tasks that may involve issues that should prevent completion
 */
trait Manager
{
   /**
    * As issues are added, they are stored here
    * 
    * @var array.<sndsgd\Issue>
    */
   protected $issues_ = [];

   /**
    * Add an issue
    * 
    * @param sndsgd\Issue $issue
    */
   public function addIssue(Issue $issue)
   {
      $this->issues_[] = $issue;
   }

   /**
    * Determine if any issues had been added
    *
    * @return boolean
    */
   public function hasIssues()
   {
      return count($this->issues_) !== 0;
   }

   /**
    * Get all issues
    *
    * @return array.<sndsgd\Issue>|null
    */
   public function getIssues()
   {
      return $this->issues_;
   }

   /**
    * Get issues that pass an instanceof test
    *
    * @return array.<sndsgd\Issue>|null
    */
   public function getIssuesByClass($type)
   {
      $ret = [];
      foreach ($this->issues_ as $issue) {
         if ($issue instanceof $type) {
            $ret[] = $issue;
         }
      }
      return (count($ret) === 0) ? null : $ret;
   }

   /**
    * Convenience method to add an error
    * 
    * @param string $message
    * @param array|null $data
    */
   public function addError($message, $data = null)
   {
      $this->issues_[] = new Error($message, $data);
   }

   /**
    * Convenience method to get all errors
    * 
    * @return array.<sndsgd\issue\Error>|null
    */
   public function getErrors($fmt = null)
   {
      return $this->getIssuesByClass('sndsgd\\issue\\Error');
   }

   /**
    * Convenience method to add a warning
    * 
    * @param string $message
    * @param array|null $data
    */
   public function addWarning($message, $data = null)
   {
      $this->issues_[] = new Warning($message, $data);
   }

   /**
    * Convenience method to get all warnings
    * 
    * @return array.<sndsgd\issue\Warning>|null
    */
   public function getWarnings()
   {
      return $this->getIssuesByClass('sndsgd\\issue\\Warning');
   }
}

