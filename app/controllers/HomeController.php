<?php

class HomeController extends BaseController {

	/**
	 * Get Homepage (Index page)
	 * @return View home
	 */
	public function getIndex()
	{
      $items = Auth::user()->items;

		return View::make('home', array(
         'items'  => $items
      ));
	}

   /**
    * Post Homepage (Index page)
    * @return Redirect 'home'
    */
   public function postIndex()
   {
      $id = Input::get('id');
      $item = Item::findOrFail($id);
      $userId = Auth::user()->id;

      if ($item->owner_id == $userId) {
         $item->mark();
      }

      return Redirect::route('home');
   }

   /**
    * Get New Task Page
    * @return View 'new'
    */
   public function getNew()
   {
      return View::make('new');
   }

   /**
    * Post New Task Page
    * @return Redirect 'home'
    */
   public function postNew()
   {
      $rules = array(
         'name'   => 'required|min:3|max:50'
      );
      $validator = Validator::make(Input::all(), $rules);
      $userId = Auth::user()->id;

      if ($validator->fails()) {
         return Redirect::route('new')
                  ->withErrors($validator);
      }

      $item = new Item;
      $item->name = Input::get('name');
      $item->owner_id = $userId;
      $item->save();

      return Redirect::route('home');
   }

   /**
    * Get Delete To-Do list item
    * @param $task
    * @return Redirect 'home'
    */
   public function getDelete(Item $task)
   {
      if ($task->owner_id == Auth::user()->id) {
         $task->delete();
      }

      return Redirect::route('home');
   }

}
