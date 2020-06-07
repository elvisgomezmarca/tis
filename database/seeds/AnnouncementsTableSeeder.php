<?php

use App\Area;
use App\User;
use Illuminate\Database\Seeder;
use App\Announcement;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $announcements = [
            [
                'title' => 'FULLSTACK DEVELOPER',
                'description' => 'Se requiere para la empresa un desarrollador fullstack el cual seran puestos en un concursos de meritos a traves de sitio ',
                'code' => '12345',
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
            [
                'title' => 'CONTADOR',
                'description' => 'Se requiere para la empresa un estudiante de contaduria publica los postulantes deben presentar sus documentos ',
                'code' => '123456',
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
            [
                'title' => 'ABOGADO',
                'description' => 'Se requiere para la empresa un abogado el cual seran puestos en un concursos de meritos a traves de sitio ',
                'code' => '5478952',
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
            [
                'title' => 'EXPERTO BASE DE DATOS',
                'description' => 'Se requiere para la empresa un experto en el area de base de datos el cual seran puestos en un concursos de meritos a traves de sitio ',
                'code' => '12345',
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
            [
                'title' => 'EXPERTO EN .NET',
                'description' => 'Se requiere para la empresa un experto en el area de base de datos el cual seran puestos en un concursos de meritos a traves de sitido ',
                'code' => '123454',
                'start_date_announcement' => \Carbon\Carbon::now(),
                'end_date_announcement' => \Carbon\Carbon::now(),
                'start_date_calification' => \Carbon\Carbon::now(),
                'end_date_calification' => \Carbon\Carbon::now(),
            ],
        ];

        $areas = Area::find([1, 2, 3, 4]);
        $user = User::find(2);

        foreach ($announcements as $item) {
            $announ = new Announcement($item);
            $announ->save();

            $announ->areas()->attach($areas);
            $announ->postulants()->attach($user);
        }
    }
}
