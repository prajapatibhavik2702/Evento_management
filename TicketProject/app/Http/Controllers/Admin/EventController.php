<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Auth;
use App\Models\Speaker;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Admin create a event specifed QUERY PART
        $authenticatedUser = Auth::guard('admin')->user();  //Authenticate Admin user
        $adminevent = Event::whereHas('eventable',function($query) use ($authenticatedUser){
            $query->where('eventable_id',$authenticatedUser->id)
            ->where('eventable_type',get_class($authenticatedUser));
        })->orderBy('id','ASC')->get();

        //organiser create a event specifed QUERY PARt
        $orgevent =Event::whereDoesntHave('eventable',function($query) use ($authenticatedUser){
            $query->where('eventable_id',$authenticatedUser->id)
            ->where('eventable_type',get_class($authenticatedUser));
        })->orderBy('id','ASC')->get();

        //fatch EVENT data & send to event file
        $events = Event::all();
        return view('admin.events')->with(['events' => $adminevent , 'orgevent' => $orgevent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Admin create speaker SHOW ONLY,,
        $authenticatedUser = Auth::guard('admin')->user();
        $speakers =Speaker::whereHas('speakerable',function($query) use ($authenticatedUser){
            $query->where('speakerable_id',$authenticatedUser->id)
            ->where('speakerable_type',get_class($authenticatedUser));
        })->orderBy('id','ASC')->get();

        //Fatch category add to addevents file
        $categorys =Category::all();
        // $speakers=Speaker::all();
        return view('admin.addevents',compact('categorys','speakers'));
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
        $image_path = $request->file('image')->storeAs('admin/Event',$filename,'public');


        //Authenticate Admin
        $event = Auth::guard('admin')->user();

        $event_speaker= $event->events()->create([
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
        return redirect('admin/events')->with('success', 'Event Add successfully!');
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

        //Admin can't update Organiser Event so ,, QUERY GENERTED ONLY ('Admin create event Updated').
        $authenticatedUser = Auth::guard('admin')->user();
        $events = Event::whereHas('eventable',function($query) use ($authenticatedUser){
            $query->where('eventable_id',$authenticatedUser->id)
            ->where('eventable_type',get_class($authenticatedUser));
        })->findOrFail($id);

              //Only Organiser create Speaker SHOW QUERY
              $speakers =Speaker::whereHas('speakerable',function($query) use ($authenticatedUser){
                $query->where('speakerable_id',$authenticatedUser->id)
                ->where('speakerable_type',get_class($authenticatedUser));
            })->orderBy('id','ASC')->get();

        //Speaker data Fatch (Bec,, using speaker name in event file)
        // $speakers=Speaker::all();

        //category data Fatch (Bec,, using speaker name in event file)
        $categorys =Category::all();

        //Update Event data redirect with id UPDATECATEGORY FILE
        // $events=Event::find($id);

        //redirect UPDATE FILE
        return view('admin.updateevent',compact('events','categorys','speakers'));
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
            $image_path = $request->file('image')->storeAs('admin/event',$filename,'public');
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

        //Update time you can select ANY speaker & remove past speaker (USING "sync")
        $event->speaker()->sync($request->speaker);

        //redirect to events file
        return redirect('admin/events')->with('success', 'Event Updated successfully!');
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
        return redirect()->route('admin.events.index')->with('message', 'Event deleted successfully.');

    }
}
