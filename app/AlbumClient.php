<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumClient extends Model
{

    protected $table = 'album_clients';

    protected $fillable = [
        'client_id','name','img','disponible','date'
    ];

}
