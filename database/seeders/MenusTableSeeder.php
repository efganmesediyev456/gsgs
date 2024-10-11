<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('menus')->delete();

        \DB::table('menus')->insert(array (
            0 =>
            array (
                'id' => 1,
                'parent_id' => NULL,
                'order' => 0,
                'status' => 1,
                'slug' => '',
                'image' => NULL,
                'header_top' => 1,
                'header' => 1,
                'footer' => 1,
                'deleted_at' => NULL,
                'created_at' => '2024-10-02 13:01:43',
                'updated_at' => '2024-10-02 13:15:15',
            ),
            1 =>
            array (
                'id' => 2,
                'parent_id' => NULL,
                'order' => 0,
                'status' => 1,
                'slug' => 'products',
                'image' => NULL,
                'header_top' => 1,
                'header' => 1,
                'footer' => 1,
                'deleted_at' => NULL,
                'created_at' => '2024-10-02 13:02:16',
                'updated_at' => '2024-10-02 13:02:20',
            ),
            2 =>
            array (
                'id' => 3,
                'parent_id' => NULL,
                'order' => 0,
                'status' => 1,
                'slug' => 'blogs',
                'image' => NULL,
                'header_top' => 1,
                'header' => 1,
                'footer' => 1,
                'deleted_at' => NULL,
                'created_at' => '2024-10-02 13:02:35',
                'updated_at' => '2024-10-02 13:02:39',
            ),
            3 =>
            array (
                'id' => 4,
                'parent_id' => NULL,
                'order' => 0,
                'status' => 1,
                'slug' => 'contact',
                'image' => NULL,
                'header_top' => 1,
                'header' => 1,
                'footer' => 1,
                'deleted_at' => NULL,
                'created_at' => '2024-10-02 13:02:51',
                'updated_at' => '2024-10-02 13:02:54',
            ),
            4 =>
                array (
                    'id' => 5,
                    'parent_id' => NULL,
                    'order' => 0,
                    'status' => 1,
                    'slug' => 'about',
                    'image' => NULL,
                    'header_top' => 1,
                    'header' => 1,
                    'footer' => 1,
                    'deleted_at' => NULL,
                    'created_at' => '2024-10-02 13:02:51',
                    'updated_at' => '2024-10-02 13:02:54',
                ),
        ));


    }
}
