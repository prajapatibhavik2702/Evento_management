<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Speaker;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //organiser create a event So,,, ONLY Organiser EVENT Show,,, (QUERY PART)
        $authenticatedUser = Auth::guard('organiser')->user();
        $orgevent = Event::whereHas('eventable',function($query) use ($authenticatedUser){
            $query->where('eventable_id',$authenticatedUser->id)
            ->where('eventable_type',get_class($authenticatedUser));
        })->orderBy('id','ASC')->get();

        //fatch EVENT data & send to event file
        $events=Event::all();
        return view('organiser.events')->with(['events' => $orgevent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Only Organiser create Speaker SHOW QUERY
        $authenticatedUser = Auth::guard('organiser')->user();
        $speakers =Speaker::whereHas('speakerable',function($query) use ($authenticatedUser){
            $query->where('speakerable_id',$authenticatedUser->id)
            ->where('speakerable_type',get_class($authenticatedUser));
        })->orderBy('id','ASC')->get();
        //Fatch category add to addevents file
        $categorys =Category::all();
        // $speakers=Speaker::all();
        return view('organiser.addevents',compact('categorys','speakers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate data store
        $validatedData= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description'=>['required'],
            'image'=>['required','mimes:png,jpg,jpeg'],
            'category'=>['required'],
            'date'=>['required'],
            'start_time'=>['required'],
            'end_time'=>['required'],
            'total_ticket'=>['required','max:350'],
            'available_ticket'=>['nullable'],
            'price'=>['required'],
            'address'=>['required'],
            'city'=>['required'],
            'state'=>['required'],
            'pincode'=>['required','digits:6'],
            'speaker'=>['required'],
        ]);

        //image name store in file variable & convert HASH name
        $file=$request->file('image');
        $filename=$file->hashName();

        //storage path in storage folder
        $image_path = $request->file('image')->storeAs('organiser/Event',$filename,'public');

        //Authenticate Organiser
        $event = Auth::guard('organiser')->user();

        $event_speaker=$event->events()->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$filename,
            'category'=>$request->category,
            'date'=>$request->date,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'total_ticket'=>$request->total_ticket,
            'available_ticket'=>$request->total_ticket,
            'price'=>$request->price,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'pincode'=>$request->pincode,
            'status'=>'active',
        ]);

        //relation event ma event_id fatch speaker_id attach karai,,,
        $event_speaker->speaker()->attach($request->speaker);

        //redirect Admin Event.
        return redirect('organiser/events')->with('success', 'Event Add successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //Oraniser can't update Admin Event so ,, QUERY GENERTED ONLY ('organiser create event Updated').
         $authenticatedUser = Auth::guard('organiser')->user();
         $events = Event::whereHas('eventable',function($query) use ($authenticatedUser){
             $query->where('eventable_id',$authenticatedUser->id)
             ->where('eventable_type',get_class($authenticatedUser));
         })->findOrFail($id);

         //Only Organiser create Speaker SHOW QUERY
         $speakers =Speaker::whereHas('speakerable',function($query) use ($authenticatedUser){
            $query->where('speakerable_id',$authenticatedUser->id)
            ->where('speakerable_type',get_class($authenticatedUser));
        })->orderBy('id','ASC')->get();

        //Update Event data redirect with id UPDATECATEGORY FILE
        // $events=Event::find($id);
        //SELECT OPTION So,, category data send,,

        $categorys =Category::all();
        // $speakers=Speaker::all();
        return view('organiser.updateevent',compact('events','categorys','speakers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //find id update Event
        $event=Event::find($id);

        //validated data update time store
        $validatedData= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description'=>['required'],
            'image'=>['nullable'],           //'mimes:png,jpg,jpeg'
            'category'=>['required'],
            'date'=>['required'],
            'start_time'=>['required'],
            'end_time'=>['required'],
            'total_ticket'=>['required','max:350'],
            'available_ticket'=>['nullable'],
            'price'=>['required'],
            'address'=>['required'],
            'city'=>['required'],
            'state'=>['required'],
            'pincode'=>['required','digits:6'],
            'speaker'=>['nullable'],
        ]);

        //condition cheak image is update to ,, so store new images condition,,
        if(isset($request->image))
        {
            $file=$request->file('image');
            $filename=$file->hashName();
            $image_path = $request->file('image')->storeAs('organiser/event',$filename,'public');
            $event->image=$filename;
        }
        //store updated data
        $event->name=$request->name;
        $event->description=$request->description;
        $event->category=$request->category;
        $event->date=$request->date;
        $event->start_time=$request->start_time;
        $event->end_time=$request->end_time;
        $event->total_ticket=$request->total_ticket;
        $event->available_ticket=$request->available_ticket;
        $event->price=$request->price;
        $event->address=$request->address;
        $event->city=$request->city;
        $event->state=$request->state;
        $event->pincode=$request->pincode;
        $event->available_ticket=$request->total_ticket;
        $event->save();

        //relation event ma event_id fatch speaker_id attach karai,,,
        $event->speaker()->sync($request->speaker);
        //redirect to events file
        return redirect('organiser/events')->with('success', 'Event Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Deleted Category fatch id to DATA
        $events=Event::find($id);
        $events->delete();

        //redirect index file DELETE SUCCESSFULLY!!!
        return redirect()->route('organiser.events.index')->with('message', 'Event deleted successfully.');

    }
}
