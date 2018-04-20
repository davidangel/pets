<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use Spatie\Tags\Tag;
use App\Traits\HasAvatar;

class Pet extends Model
{
    use HasTags;

    protected $appends = ['avatar_url'];
    protected $with = ['human'];

    public function human()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public function getAvatarUrlAttribute() {
        return asset('storage/uploads/avatars/') . '/' . $this->avatar;
    }

    public function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

}
