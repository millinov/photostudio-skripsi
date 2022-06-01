<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Studio;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Millinov Admiral',
            'email' => 'milinovadmiral@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'Doni Ander',
            'email' => 'studiojaya@gmail.com',
            'password' => bcrypt('donijaya'),
        ]);
        
        User::create([
            'name' => 'Sara Ikhsan',
            'email' => 'sara_ikhsan@gmail.com',
            'password' => bcrypt('sara1999'),
        ]);

        User::create([
            'name' => 'Tommy Wijaya',
            'email' => 'elegantstudio@gmail.com',
            'password' => bcrypt('wijaya123'),
        ]);

        User::create([
            'name' => 'Samuel Hendra',
            'email' => 'forwardstudio@gmail.com',
            'password' => bcrypt('1900699'),
        ]);

        User::create([
            'name' => 'Angelica Zandra',
            'email' => 'angelicabeauty@gmail.com',
            'password' => bcrypt('angel999'),
        ]);

        Studio::create([
            'title' => 'Studio Intan Cahaya',
            'owner' => 'Sara',
            'slug' => 'studio-intan-cahaya',
            'category_id' => '3',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit',
            'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit maxime modi blanditiis deleniti non, placeat, facilis saepe sint odit possimus adipisci natus ad maiores consectetur cum, repellat ex quasi fuga eaque doloribus.</p><p>Iusto quam tempore quis minus nesciunt a doloribus ex et, ducimus placeat impedit alias adipisci earum repudiandae ad eveniet dicta maiores esse, explicabo laudantium, sit facere beatae! Tempora nulla nobis magni laborum ullam eius ipsam suscipit, placeat quaerat non amet illo dolore, saepe cumque. Laborum officia minima tenetur beatae perferendis exercitationem quo reiciendis non quod, distinctio repudiandae repellat similique, mollitia unde quos.</p>'
        ]);
        
    }
}
