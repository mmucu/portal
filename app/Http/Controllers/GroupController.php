<?php

namespace churchapp\Http\Controllers;

use churchapp\Group;
use Illuminate\Http\Request;

use churchapp\Http\Requests\GroupFormRequest;
use churchapp\Http\Controllers\Controller;
use Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth'); //check if user is authentic
    }

    public function index()
    {
        $groups = \churchapp\Group::all();
        return view('groups.index')->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupFormRequest $request)
    {
        $group = new Group(array('name' => $request->get('name'),
                                'description' => $request->get('description'),
                                'creator_id' => $request->get('creator_id')
        ));
        $group->save();

        return \Redirect::route('groups.show', array('id' => $group->id ))->with('message','new group has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        return view('groups.show')->with('group',$group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('groups.edit')->with('group', $group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupFormRequest $request, $id)
    {
        $group = Group::find($id);
        if($group->getCreator()->id === Auth::user()->id){
            $group->update(array('name' => $request->get('name'),
                'description' => $request->get('description'),
                'creator_id' => $request->get('creator_id')
            ));

            return \Redirect::route('groups.show', array('id' => $group->id))->with('message', 'the group has been updated');
        }
        else{
            return \Redirect::route('groups.show', array('id' => $group->id))->with('message', 'cannot edit the group');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
