<?php
namespace App\Traits;

trait HasAvatar
{

    protected $appends = ['avatar_url'];
    
    public function getAvatarUrlAttribute() {
        return asset('storage/uploads/avatars/') . '/' . $this->avatar;
    }

}