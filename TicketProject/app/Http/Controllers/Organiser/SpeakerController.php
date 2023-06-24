<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Auth;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authenticatedUser = Auth::guard('organiser')->user();
        $orgspeaker = Speaker::whereHas('speakerable',function($query) use ($authenticatedUser){
            $query->where('speakerable_id',$authenticatedUser->id)
            ->where('speakerable_type',get_class($authenticatedUser));
        })->orderBy('id','ASC')->get();

        $speakers=Speaker::all();
        return view('organiser.speaker')->with(['speakers' => $orgspeaker]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organiser.addspeaker');
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
        ]);

        //image name store in file variable & convert HASH name
        $file=$request->file('image');
        $filename=$file->hashName();


        //storage path in storage folder
        $image_path = $request->file('image')->storeAs('organiser/speaker',$filename,'public');

        //one to many relation,,, speaker
        $organiser = Auth::guard('organiser')->user();
        //store data with file(image)
        $organiser->Speakers()->create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$filename,
        ]);

        //redirect file speaker
        return redirect('organiser/speaker')->with('success', 'Speaker Add successfully!');

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
        $speaker=Speaker::find($id);
        return view('organiser.updatespeaker',compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

            //find id update speaker
            $speaker=Speaker::find($id);

            //validated data update time store
            $validatedData= $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description'=>['required'],
                'image'=>['nullable','mimes:png,jpg,jpeg'],
            ]);

            //condition cheak image is update to ,, so store new images condition,,
            if(isset($request->image))
            {
                $file=$request->file('image');
                $filename=$file->hashName();
                $image_path = $request->file('image')->storeAs('organiser/speaker',$filename,'public');
                $speaker->image=$filename;
            }
            //store updated data
            $speaker->name=$request->name;
            $speaker->description=$request->description;
            $speaker->save();
            //redirect to speaker file
            return redirect('organiser/speaker')->with('success', 'Speaker Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speakers=Speaker::find($id);
        $speakers->delete();

        return redirect()->route('organiser.speaker.index')->with('message', 'Speaker deleted successfully.');

    }
}
