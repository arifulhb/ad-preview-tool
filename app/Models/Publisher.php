<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'publishers';


    /**
     * Created by relation
     *
     * @return App\User
     */
    public function createdBy ()
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
