<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

/**
 * MoatApi class is a abstract class to get artist information from Moat API endpoint.
 * 
 * Usage: 
 * MoatApi::getAllArtists();
 * MoatApi::getArtistById($id);
 * 
 * @autor Bruno Brandão <brunolopesbrandao@gmail.com>
 *  
 */
abstract class MoatApi
{
    /**
     * Get a list with information of all artists
     * 
     * @return array with all artists information
     */
    public static function getAllArtists():array
    {
        // init 
        $arrArtist = array();        
        
        // get api reponse
        $response = Http::withHeaders([
            'Basic' => env('MOAT_API_KEY')
        ])->get(env('MOAT_API_URL'));

        // check the API response
        if ($response->successful())
        {
            // mount array with artist list
            foreach ($response->json() as $art)
            {
                // save artist
                $arrArtist[]    = [
                    'id' => $art[0]["id"],
                    'name' => $art[0]["name"],
                    'twitter' => $art[0]["twitter"]
                ];
            }

            // order artist list by name ascendent
            $arrArtist = array_values(Arr::sort($arrArtist, function ($value) {
                return $value['name'];
            }));
        } 

        return $arrArtist;
    }

    /**
     * Get information from artist by id
     * 
     * @param int $id of artist
     * @return array with artist information     
     */
    public static function getArtistById($id):array
    {
        // init 
        $artist = array();
       
        $response = Http::withHeaders([
            'Basic' => env('MOAT_API_KEY')
        ])->get(env('MOAT_API_URL') . "?artist_id=" . $id);

        // check the API response
        if ($response->successful())
        {
            // json response
            $jsonArtist = $response->json();

            // artist
            $artist = [
                'id' => $id,
                'name' => $jsonArtist[0]["name"],
                'twitter' => $jsonArtist[0]["twitter"]
            ];                        

        }
        
        return $artist;
    }

}
