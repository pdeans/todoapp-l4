<?php

class Item extends Eloquent {

   /**
    * Mark To-Do List item
    */
   public function mark()
   {
      $this->done = $this->done ? false : true;

      $this->save();
   }
}
