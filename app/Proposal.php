<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //
    protected $fillable = [
                            'name','subject',
                            'message', 'email',
                            'date_create_proposal',
                            'client_id'
                        ];
}
