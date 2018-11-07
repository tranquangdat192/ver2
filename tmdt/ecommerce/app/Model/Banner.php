<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'company', 'position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function getImagesAttribute(){
        return $this->getThumbnail($this->image, 'larger');
    }

    public function getThumbnail($image, $type)
    {
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $name = str_replace_last('.'.$ext, '', $image);
        return $name.'-'.$type.'.'.$ext;
    }
}
