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

            $path = public_path().'/storage/uploads/avatars';
            if (File::isDirectory($path)) { File::deleteDirectory($path); }
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

            DB::table('pets')->delete();
            DB::table('users')->delete();
            DB::table('tags')->delete();
            DB::table('taggables')->delete();

            $this->createDevUser();

            // create users
            factory(App\User::class, 25)->create()->each(function ($user) {

                // (maybe) create pets
                $pets = [];
                factory(App\Pet::class, rand(0, 3))->create()->each(function ($pet) use ($user) {
                    $user->pets()->save($pet);
                    $pets[] = $pet;
                });

            });

            $this->command->info('Successfully seeded database with sample users and pets. (login with dev@dev.com/secret)');
        } else {
            $this->command->line('db:seed command has been cancelled.');
        }
    }

    public function createDevUser()
    {
        // create dev user
        $devUser = factory(App\User::class)->create([
            'email' => 'dev@dev.com'
        ]);

        // create pets
        $pets = [];
        factory(App\Pet::class, rand(2, 4))->create(['user_id' => $devUser->id])->each(function ($pet) {
            $pets[] = $pet;
        });

        if(!empty($pets)) {
            $devUser->pets()->save($pets);
        }

        $devUser->save();
    }
}
