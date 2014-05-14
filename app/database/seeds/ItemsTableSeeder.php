<?php

class ItemsTableSeeder extends Seeder {

   public function run()
   {
      DB::table('items')->delete();

      $users = array(
         'owner_id'  => 1,
         'name'      => 'Pick up eggs',
         'done'      => false
      );

      $users2 = array(
         'owner_id'  => 1,
         'name'      => 'Walk the dogs',
         'done'      => true
      );

      $users3 = array(
         'owner_id'  => 1,
         'name'      => 'Go to the gym',
         'done'      => false
      );

      DB::table('items')->insert($users, $users2, $users3);
   }
}
