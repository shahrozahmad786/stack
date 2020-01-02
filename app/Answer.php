<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;

class Answer extends Model
{
    
   public function question()
   {
   	  return $this->belongTo(Question::class);

   }


   public function user()
   {
   	  return $this->belongTo(User::class);

   }
     public function getBodyHtmlAttribute()
     {
        return \Parsedown::instance()->text($this->body);
     }
}
