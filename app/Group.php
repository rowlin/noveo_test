<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];


    public function users()
    {
        return $this->belongsToMany('App\User', 'pivot_users_groups', 'group_id');
    }


    /*
     * return null if no have members
     * or return $member_ name (array)
     */
    public function getMembers(){
            $group =  Group::find($this->id);
            if($group){
                $members = $group->users()->get();
                if(isset($members)){
                    foreach($members as $member) {
                      $value[$member->id] =  $member->first_name ." ". $member->last_name;
                    }
                    return $value;
                }else $value = null;
            }else{
                // or Wow
                $value = null ;
            }
        return $value;
    }

}
