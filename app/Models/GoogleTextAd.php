<?php

namespace App\Models;

use App\User;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoogleTextAd extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'google_text_ads';


        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['headline_1', 'headline_2', 'headline_3',
    'description_1', 'description_2', 'display_url', 'publisher_id'];

    /**
     * Get the advertisemant.
     */
    public function advertise()
    {
        return $this->morphOne(Advertisement::class, 'advertisable');
    }

    /**
     * Publication relation
     *
     * @return App\Publisher
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    /**
     * Created by relation
     *
     * @return App\User
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Updated by relation
     *
     * @return App\User
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
