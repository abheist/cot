<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//For Slug
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Article extends Model implements SluggableInterface
{
    protected $fillable=[
    'article_title',
    'article_body',
    'blog_id',
    'short_desc',
    'slug',
    'cover_pic',
    'tags'
    ];

    use SluggableTrait;

    protected $sluggable=[
    'build_from'=>'article_title',
    'save_to'=>'slug'
    ];

    protected $primaryKey='article_id';
    
    protected $table='blog_articles';

    public function blog(){
    	return $this->belongsTo('App\Blog');
    }

}
