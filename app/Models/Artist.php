<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Service\MoatApi;

class Artist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'twitter'        
    ];

    /**
     * Get the artists albums
     * 
     */
    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    
    /**
     * Override method all
     * 
     * @param array $columns
     * @return array of artists
     */
    public static function all($columns = Array()):array
    {
        // init
        $arrArtist  = array();

        // get all artists
        $response  = MoatApi::getAllArtists();

        foreach($response as $resp)
        {
            // new artist
            $artist = new self;

            // set
            $artist->id = $resp['id'];
            $artist->name = $resp['name'];
            $artist->twitter = $resp['twitter'];

            // save
            $arrArtist[]    = $artist;
        }

        return $arrArtist;
    }

    /**
     * Override method find
     * 
     * @param array $columns
     * @return array of artists
     */
    public static function find(int $id):self
    {
        // new artist
        $artist = new self;
        
        // get all artists
        $response  = MoatApi::getArtistById($id);
                        
        // check artist response
        if (count($response))
        {
            // set
            $artist->id = $response['id'];
            $artist->name = $response['name'];
            $artist->twitter = $response['twitter'];
        }

        return $artist;
    }
}
