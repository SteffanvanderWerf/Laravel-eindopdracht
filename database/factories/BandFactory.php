<?php

namespace Database\Factories;

use App\Models\Band;
use Illuminate\Database\Eloquent\Factories\Factory;

class BandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Band::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
       
        return [
            'band_name' => $this->faker->company,
            'music_genres'=>'rock',
            'description'=>'lorum',
            'biography'=>'its my life',
            'bg_color'=>'white',
            'text_color'=>'black',
        ];

    }
}
