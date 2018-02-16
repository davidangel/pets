<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if ($this->command->confirm('This will delete existing data from the database and create new seed data. Are you sure you want to continue?')) {
            DB::table('users')->delete();
            DB::table('pets')->delete();
            DB::table('tags')->delete();
            DB::table('taggables')->delete();

            // create dev user
            factory(App\User::class)->make([
                'email' => 'dev@dev.com'
            ])->save();

            // create users
            factory(App\User::class, 9)->create()->each(function ($user) {


                // (maybe) create pets
                $pets = [];
                factory(App\Pet::class, rand(0, 3))->create()->each(function ($pet) {
                    $pets[] = $pet;
                });

                if(!empty($pets)) {
                    $user->pets()->save($pets);
                }

            });

            $this->command->info('Successfully seeded database with sample users and pets. (login with dev@dev.com/secret)');
        } else {
            $this->command->line('db:seed command has been cancelled.');
        }
    }
}
