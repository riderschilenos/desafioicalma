<?php

namespace Database\Seeders;
use App\Models\Serie;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Review;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $series = Serie::factory(20)
                        ->hasSponsors(10)
                        ->create();
        

        foreach ($series as $serie){
            
            Review::factory(5)->create([
                'serie_id'=>$serie->id
            ]);

            Image::factory(1)->create([
                'imageable_id' => $serie->id,
                'imageable_type'=>'App\Models\Serie'
            ]);
        }
     }
}
