<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use Spatie\Tags\Tag;

class Pet extends Model
{
    use HasTags;

    public function human()
    {
        return $this->belongsTo(User::class);
    }

    public function addBreed($tag='')
    {
        $tagWithType = Tag::findOrCreate([$tag], 'breedTag');
        $this->attachTag($tagWithType);
        return $this;
    }

    public function removeBreed($tag='')
    {
        $tagWithType = Tag::findOrCreate([$tag], 'breedTag');
        $this->detachTag($tagWithType);
        return $this;
    }

}
