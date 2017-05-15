<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumImagesClient extends Model
{
    protected $table = 'albumphotos_clients';

    protected $fillable = [
        'album_clients_id', 'path', 'select', 'order'
    ];

    public $timestamps = false;
}
