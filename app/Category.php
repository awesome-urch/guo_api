<?php
/**
 * Created by PhpStorm.
 * User: Awesome_Urch
 * Date: 6/28/2020
 * Time: 4:44 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'thumbnail'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}