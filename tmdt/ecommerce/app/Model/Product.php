<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Resizable;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'price', 'thumbnail', 'discount', 'quantity', 'brand_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function getSalePriceAttribute()
    {
        return round($this->price - $this->price * $this->discount / 100, 2);
    }

    public function brandId()
    {
        return $this->belongsTo('App\Model\Brand','brand_id');
    }

    public function getThumbAttribute(){
        if ($this->thumbnail){
            $thumbnails = [];
            foreach (json_decode($this->thumbnail) as $thumb){
                $thumbnails[] = $this->getThumbnail($thumb, 'small');
            }
            return $thumbnails;
        } else {
            return false;
        }
    }

    public function getImagesAttribute(){
        return $this->getThumbnail($this->image, 'larger');
    }

    public function getMediumImageAttribute(){
        return $this->getThumbnail($this->image, 'medium');
    }

    public function getSmallImageAttribute(){
        return $this->getThumbnail($this->image, 'small');
    }

    public function getThumbnail($image, $type)
    {
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $name = str_replace_last('.'.$ext, '', $image);
        return $name.'-'.$type.'.'.$ext;
    }
}