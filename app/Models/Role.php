<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $table = 'usr_roles';
    protected $primaryKey = 'roles_id';
    protected $fillable = [
       'roles_id','roles_key','roles_name','is_editable','sort_order'
    ];


    public function user(){
        return $this->hasMany(UserHasRoles::class, 'roles_id', 'roles_id');
    }
    
}
