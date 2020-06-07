<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'name' => 'DESARROLLO',
                'slug' => 'desarrollo',
                'description' => 'Esta es el area de desarrollo',
            ],
            [
                'name' => 'TECNOLOGIA',
                'slug' => 'tecnologia',
                'description' => 'Esta es el area de tecnologia',
            ],
            [
                'name' => 'ECONOMIA',
                'slug' => 'economia',
                'description' => 'Esta es el area de economia',
            ],
            [
                'name' => 'CIENCIAS JURIDICAS',
                'slug' => 'juridicas',
                'description' => 'Esta es el area de ciencias juridicas',
            ],
        ];

        foreach ($areas as $item) {
            Area::create($item);
        }
    }
}
