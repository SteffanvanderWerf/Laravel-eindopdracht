<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Band;
use Illuminate\Foundation\Testing\RefreshDatabase;


class BandTest extends TestCase
{
    
    use RefreshDatabase;
    
    /** @test */
    function test_bandSearch(){
        //maak 5 willekeurige Banden die niet in test naar voren komen
        Band::factory()->count(5)->create();
        //twee duidelijk gedefinieerde Banden
        $first = Band::factory()->create(['band_name' => 'Name']);
        
        $Bands = Band::bandSearch("Name");
        //Er moeten 2 Banden in de lijst zitten:
        // 1 met voornaam = Name en 1 met achternaam = Name
        $this->assertEquals($Bands->count(), 1);
        //De eerste is bekend
        $this->assertEquals($Bands->first()->id, $first->id);
        //De tweede zou ook nog getest kunnen worden
       
    }
}

