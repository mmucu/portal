<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use churchapp\Event;
use Carbon\Carbon;
use churchapp\Update;
use Auth;

class EventController extends Controller
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
        $events = Event::orderBy('created_at','DESC')->paginate(20);
        return view('events.index')->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start_time = $request->get('start_date')." ".$request->get('start_time');
        $stop_time = $request->get('stop_date')." ".$request->get('stop_time');
        $start = Carbon::createFromFormat('Y-m-d H:i A',$start_time );
        $end = Carbon::createFromFormat('Y-m-d H:i A', $stop_time);

        $request->merge(['start' => $start_time]);
        $request->merge(['stop' => $stop_time]);
        $this->validate($request, [ 'start_time' => 'required',
                    'stop_time' => 'required|after:start'
                ]);
        $event = new Event(
            array('name' => $request->get('name'),
            'description' => $request->get('description'),
            'host' => $request->get('host'),
            'venue' => $request->get('venue'),
            'starting' => $start,
                'ending' => $end,
                'image_name' => "randomstring",
                'audience' => $request->get('audience')
            ));
        $event->save();

        $update = new Update(['creator_id' => Auth::user()->id ]);
        $event->updates()->save($update);


        return \Redirect::route('events.show', $event)->with('message','Thank you for creating a new event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show')->withEvent($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
