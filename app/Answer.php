<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;

class Answer extends Model
{

  protected $fillable=['body','user_id'];
    
   public function question()
   {
   	  return $this->belongsTo(Question::class);

   }


   public function user()
   {
   	  return $this->belongsTo(User::class);

   }
     public function getBodyHtmlAttribute()
     {
        return \Parsedown::instance()->text($this->body);
     }

      public function getCreatedDateAttribute()
    {
         return $this->created_at->diffForHumans();
    } 

     public static function boot()
     {
        parent::boot();
           // when ever answer is created
        // it increment the anser count
        static::created(function($answer){
         $answer->question->increment('answers_count');
        });

        
            // when ever answer is deleted
        // it decrement the anser count
        static::deleted(function($answer){
          $question=$answer->question;
         $question->decrement('answers_count');

         if($question->best_answer_id==$answer->id)
         {
             $question->best_answer_id=Null;
             $question->save();
         }
        });


     }

     public function getStatusAttribute()
     {
        return $this->isBest() ? 'vote-accepted ' : '';
     }

     public function getIsBestAttribute()
     {
         return $this->isBest();
     }

     public function isBest()
     {
         return $this->id==$this->question->best_answer_id;
     }


}
