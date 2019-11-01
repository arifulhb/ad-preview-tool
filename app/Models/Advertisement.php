<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'advertisements';

    /**
     * Get the owning advertisable model.
     */
    public function advertisable()
    {
        return $this->morphTo();
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


    /**
     * Mark Advertisement Published
     *
     * @return void
     */
    public function markPublished()
    {
        $this->is_published = true;
        $this->save();
    }

    /**
     * Mark Advertisement Unpublished
     *
     * @return void
     */
    public function markUnPublished()
    {
        $this->is_published = false;
        $this->save();
    }

    /**
     * Set Visibility
     *
     * @param int $value
     * @return void
     */
    public function setVisibility($value)
    {
        if (in_array($value, VISIBILITIES)) {
            $this->visibility = $value;
            $this->save();
        }
    }
}
