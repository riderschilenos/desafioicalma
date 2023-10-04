<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'name'=>'Rio Cup',
            'url'=>'https://youtu.be/5OoF_h6qKeQ',
            'iframe'=>'<iframe width="560" height="315" src="https://www.youtube.com/embed/5OoF_h6qKeQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'platform_id'=>1,
            'serie_id'=>1

        ]);


        $videos = Video::factory(50)->create();

        foreach ($videos as $video){
            Image::factory(1)->create([
                'imageable_id' => $video->id,
                'imageable_type'=>'App\Models\Video'
            ]);
        }


    }
}
