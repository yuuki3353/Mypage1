<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

        class Guardian extends Model
    {
        protected $fillable = [
            'title',
            'body' ,
            'user_id',
        ];
        //
        
         public function getByLimit(int $limit_count = 10)
        {
            return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
        }
        
        public function category()
        {
            return $this->belongsTo('App\category');
        }
    }