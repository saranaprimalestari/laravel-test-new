<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // User::create([
        //     'name' => 'Indra',
        //     'email' => 'indra@saranaprimalestari.com',
        //     'password' => bcrypt('12345')
        // ]);
        
        User::create([
            'name' => 'Riduan',
            'username' => 'riduan',
            'email' => 'riduan@saranaprimalestari.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos suscipit enim nemo deleniti aperiam reiciendis tempora quam, nulla,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos suscipit enim nemo deleniti aperiam reiciendis tempora quam, nulla, porro eaque adipisci quia minima vitae blanditiis recusandae? Tenetur harum quis obcaecati laborum ipsam modi. Similique dolorum provident recusandae placeat possimus vitae natus quo sapiente ad, deleniti tempore repellendus eius. Exercitationem sunt nam qui mollitia! Tempore dolores ipsam omnis exercitationem nisi fugit velit officiis unde fugiat dolor at amet, esse nam veritatis harum voluptatum voluptas aspernatur cumque ipsum a ea, placeat impedit dolore sed. Aut, ad atque! Id pariatur accusamus, harum ratione quos similique, labore nisi dignissimos voluptate mollitia atque repudiandae unde.',
        //     'category_id' => '1',
        //     'user_id' => '1'
        // ]);  

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos suscipit enim nemo deleniti aperiam reiciendis tempora quam, nulla,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos suscipit enim nemo deleniti aperiam reiciendis tempora quam, nulla, porro eaque adipisci quia minima vitae blanditiis recusandae? Tenetur harum quis obcaecati laborum ipsam modi. Similique dolorum provident recusandae placeat possimus vitae natus quo sapiente ad, deleniti tempore repellendus eius. Exercitationem sunt nam qui mollitia! Tempore dolores ipsam omnis exercitationem nisi fugit velit officiis unde fugiat dolor at amet, esse nam veritatis harum voluptatum voluptas aspernatur cumque ipsum a ea, placeat impedit dolore sed. Aut, ad atque! Id pariatur accusamus, harum ratione quos similique, labore nisi dignissimos voluptate mollitia atque repudiandae unde.',
        //     'category_id' => '1',
        //     'user_id' => '1'
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos suscipit enim nemo deleniti aperiam reiciendis tempora quam, nulla,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos suscipit enim nemo deleniti aperiam reiciendis tempora quam, nulla, porro eaque adipisci quia minima vitae blanditiis recusandae? Tenetur harum quis obcaecati laborum ipsam modi. Similique dolorum provident recusandae placeat possimus vitae natus quo sapiente ad, deleniti tempore repellendus eius. Exercitationem sunt nam qui mollitia! Tempore dolores ipsam omnis exercitationem nisi fugit velit officiis unde fugiat dolor at amet, esse nam veritatis harum voluptatum voluptas aspernatur cumque ipsum a ea, placeat impedit dolore sed. Aut, ad atque! Id pariatur accusamus, harum ratione quos similique, labore nisi dignissimos voluptate mollitia atque repudiandae unde.',
        //     'category_id' => '2',
        //     'user_id' => '1'
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos suscipit enim nemo deleniti aperiam reiciendis tempora quam, nulla,',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos suscipit enim nemo deleniti aperiam reiciendis tempora quam, nulla, porro eaque adipisci quia minima vitae blanditiis recusandae? Tenetur harum quis obcaecati laborum ipsam modi. Similique dolorum provident recusandae placeat possimus vitae natus quo sapiente ad, deleniti tempore repellendus eius. Exercitationem sunt nam qui mollitia! Tempore dolores ipsam omnis exercitationem nisi fugit velit officiis unde fugiat dolor at amet, esse nam veritatis harum voluptatum voluptas aspernatur cumque ipsum a ea, placeat impedit dolore sed. Aut, ad atque! Id pariatur accusamus, harum ratione quos similique, labore nisi dignissimos voluptate mollitia atque repudiandae unde.',
        //     'category_id' => '2',
        //     'user_id' => '2'
        // ]);

        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $provinceRow) {
            Province::create([
                'province_id' => $provinceRow['province_id'],
                'name'        => $provinceRow['province'],
            ]);
            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])->get();
            foreach ($daftarKota as $cityRow) {
                City::create([
                    'province_id'   => $provinceRow['province_id'],
                    'city_id'       => $cityRow['city_id'],
                    'name'          => $cityRow['city_name'],
                ]);
            }
        }
    }
}
