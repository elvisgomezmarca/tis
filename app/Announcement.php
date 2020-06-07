<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Announcement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'code',
        'start_date_announcement',
        'end_date_announcement',
        'start_date_calification',
        'end_date_calification',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function areas()
    {
        return $this->belongsToMany('App\Area');
    }

    /**
     * Get the requirements for the announcement.
     */
    public function requirements()
    {
        return $this->hasMany('App\Requirement');
    }

    /**
     * Get the requirements required.
     */
    public function requiredRequirements()
    {
        $announcement = $this;

        return Requirement::where('announcement_id', $announcement->id)->where('required', 1)->get();
    }

    /**
     * Get the requirements general.
     */
    public function generalRequirements()
    {
        $announcement = $this;

        return Requirement::where('announcement_id', $announcement->id)->where('required', 0)->get();
    }

    /**
     * The users that belong to the announcement.
     */
    public function postulants()
    {
        return $this->belongsToMany('App\User');
    }

}
