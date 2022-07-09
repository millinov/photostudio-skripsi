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
        User::create([
            'name' => 'Millinov Admiral',
            'username' => 'siglakavi',
            'email' => 'milinovadmiral@gmail.com',
            'phone_number' => '0218848460',
            'password' => bcrypt('12345'),
            'is_admin' => true,
            'is_seller' => true
        ]);

        User::create([
            'name' => 'Mikail Rifqi Rusdi',
            'username' => 'rifqi57',
            'email' => 'mikailrifqi11@gmail.com',
            'phone_number' => '085212430108',
            'password' => bcrypt('12345'),
            'is_admin' => true,
            'is_seller' => true
        ]);

        User::create([
            'name' => 'Mohamad Karim Gibran',
            'username' => 'agam',
            'email' => 'mkarimgibran.01@gmail.com',
            'phone_number' => '08118010116',
            'password' => bcrypt('12345'),
            'is_admin' => true,
            'is_seller' => true
        ]);

        User::factory(10)->create([
            'is_seller' => true
        ]);

        User::factory(10)->create([
            'is_seller' => false
        ]);

        Category::create([
            'name' => 'Formal',
            'slug' => 'formal'
        ]);

        Category::create([
            'name' => 'Cantik',
            'slug' => 'cantik'
        ]);

        Category::create([
            'name' => 'Wedding',
            'slug' => 'wedding'
        ]);

        Category::create([
            'name' => 'Modelling',
            'slug' => 'modelling'
        ]);

        //Studio::factory(10)->create();
        $max = 11;
        for ($i=1; $i < $max; $i++) { 
            Studio::factory()->create();
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Doni Ander',
        //     'email' => 'studiojaya@gmail.com',
        //     'password' => bcrypt('donijaya'),
        // ]);
        
        // User::create([
        //     'name' => 'Sara Ikhsan',
        //     'email' => 'sara_ikhsan@gmail.com',
        //     'password' => bcrypt('sara1999'),
        // ]);

        // User::create([
        //     'name' => 'Tommy Wijaya',
        //     'email' => 'elegantstudio@gmail.com',
        //     'password' => bcrypt('wijaya123'),
        // ]);

        // User::create([
        //     'name' => 'Samuel Hendra',
        //     'email' => 'forwardstudio@gmail.com',
        //     'password' => bcrypt('1900699'),
        // ]);

        // User::create([
        //     'name' => 'Angelica Zandra',
        //     'email' => 'angelicabeauty@gmail.com',
        //     'password' => bcrypt('angel999'),
        // ]);

        // Studio::create([
        //     'title' => 'Studio Intan Cahaya',
        //     'slug' => 'studio-intan-cahaya',
        //     'category_id' => '3',
        //     'user_id' => '3',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit',
        //     'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit maxime modi blanditiis deleniti non, placeat, facilis saepe sint odit possimus adipisci natus ad maiores consectetur cum, repellat ex quasi fuga eaque doloribus.</p><p>Iusto quam tempore quis minus nesciunt a doloribus ex et, ducimus placeat impedit alias adipisci earum repudiandae ad eveniet dicta maiores esse, explicabo laudantium, sit facere beatae! Tempora nulla nobis magni laborum ullam eius ipsam suscipit, placeat quaerat non amet illo dolore, saepe cumque. Laborum officia minima tenetur beatae perferendis exercitationem quo reiciendis non quod, distinctio repudiandae repellat similique, mollitia unde quos.</p>'
        // ]);
        
        // Studio::create([
        //     'title' => 'Studio Jaya Murni',
        //     'slug' => 'studio-jaya-murni',
        //     'category_id' => '1',
        //     'user_id' => '2',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit',
        //     'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit maxime modi blanditiis deleniti non, placeat, facilis saepe sint odit possimus adipisci natus ad maiores consectetur cum, repellat ex quasi fuga eaque doloribus.</p><p>Iusto quam tempore quis minus nesciunt a doloribus ex et, ducimus placeat impedit alias adipisci earum repudiandae ad eveniet dicta maiores esse, explicabo laudantium, sit facere beatae! Tempora nulla nobis magni laborum ullam eius ipsam suscipit, placeat quaerat non amet illo dolore, saepe cumque. Laborum officia minima tenetur beatae perferendis exercitationem quo reiciendis non quod, distinctio repudiandae repellat similique, mollitia unde quos.</p>'
        // ]);

        // Studio::create([
        //     'title' => 'Elegant Studio',
        //     'slug' => 'elegant-studio',
        //     'category_id' => '1',
        //     'user_id' => '4',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit',
        //     'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit maxime modi blanditiis deleniti non, placeat, facilis saepe sint odit possimus adipisci natus ad maiores consectetur cum, repellat ex quasi fuga eaque doloribus.</p><p>Iusto quam tempore quis minus nesciunt a doloribus ex et, ducimus placeat impedit alias adipisci earum repudiandae ad eveniet dicta maiores esse, explicabo laudantium, sit facere beatae! Tempora nulla nobis magni laborum ullam eius ipsam suscipit, placeat quaerat non amet illo dolore, saepe cumque. Laborum officia minima tenetur beatae perferendis exercitationem quo reiciendis non quod, distinctio repudiandae repellat similique, mollitia unde quos.</p>'
        // ]);

        // Studio::create([
        //     'title' => 'Forward PhotoStudio',
        //     'slug' => 'forward-photostudio',
        //     'category_id' => '3',
        //     'user_id' => '5',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit',
        //     'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit maxime modi blanditiis deleniti non, placeat, facilis saepe sint odit possimus adipisci natus ad maiores consectetur cum, repellat ex quasi fuga eaque doloribus.</p><p>Iusto quam tempore quis minus nesciunt a doloribus ex et, ducimus placeat impedit alias adipisci earum repudiandae ad eveniet dicta maiores esse, explicabo laudantium, sit facere beatae! Tempora nulla nobis magni laborum ullam eius ipsam suscipit, placeat quaerat non amet illo dolore, saepe cumque. Laborum officia minima tenetur beatae perferendis exercitationem quo reiciendis non quod, distinctio repudiandae repellat similique, mollitia unde quos.</p>'
        // ]);

        // Studio::create([
        //     'title' => 'Angelica Beauty Studio',
        //     'slug' => 'angelica-beauty-studio',
        //     'category_id' => '2',
        //     'user_id' => '6',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit',
        //     'desc' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis provident distinctio dolores suscipit harum delectus a, eligendi et qui ratione! Architecto dolore deserunt nihil reprehenderit maxime modi blanditiis deleniti non, placeat, facilis saepe sint odit possimus adipisci natus ad maiores consectetur cum, repellat ex quasi fuga eaque doloribus.</p><p>Iusto quam tempore quis minus nesciunt a doloribus ex et, ducimus placeat impedit alias adipisci earum repudiandae ad eveniet dicta maiores esse, explicabo laudantium, sit facere beatae! Tempora nulla nobis magni laborum ullam eius ipsam suscipit, placeat quaerat non amet illo dolore, saepe cumque. Laborum officia minima tenetur beatae perferendis exercitationem quo reiciendis non quod, distinctio repudiandae repellat similique, mollitia unde quos.</p>'
        // ]);
    }
}
