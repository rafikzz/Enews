<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['title' => 'Home', 'parent_id' => null, 'order' => 0, 'link' => '/'],
            ['title' => 'News', 'parent_id' => null, 'order' => 1, 'link' => '/news'],
            ['title' => 'Category', 'parent_id' => null, 'order' => 2, 'link' => '/category'],
            ['title' => 'Gallery', 'parent_id' => null, 'order' => 4, 'link' => '/gallery'],
            ['title' => 'About', 'parent_id' => null, 'order' => 3, 'link' => '/about-us'],
        ];
        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
