<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;
use churchapp\Group;
use Auth;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;

class JoinGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getJoin($id)
    {
        $group = Group::find($id);
        $user = Auth::user();
        if($group->users->contains($user))
        {
            return \Redirect::route('groups.show',array($group->id))->with('message','you are already a member of the group');
        }
        $group->users()->save($user);
        return \Redirect::route('groups.show',array($group->id))->with('message','you have joined the group');
    }
}
