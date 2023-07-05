<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;

class TourController extends Controller
{

    public function upload(Request $request)
    {
        if($request->hasFile('upload'))
        {
            $originName=$request->file('upload')->getClientOriginalName();
            $fileName=pathinfo($originName, PATHINFO_FILENAME);
            $extension=$request->file('upload')->getClientOriginalExtension();
            $fileName=$fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('save_img'), $fileName);
            $url=asset('save_img/' . $fileName);
            return response()->json(['fileName'=>$fileName, 'uploaded'=>1, 'url'=>$url]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function loadImage(Tour $p)
    {
        if ($p->image && Storage::disk('public')->exists($p->image))
        {
            $p->image = Storage::url($p->image);
        } else {
            $p->image = '/assets/images/image_blank.png';
        }
    }

    public function index()
    {
        $lst = Tour::paginate(4);
        session(['name' => 'Tên tour']);
        session(['location' => 'Địa điểm']);

        foreach($lst as $p)
        {
            $this->loadImage($p);
        }
        return view('tours.tour-index',['lst'=>$lst]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lst=Category::all();
        
        return view('tours.tour-create',['lst'=>$lst]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourRequest $request)
    {
        $p = Tour::create([
            'name'=>$request->name,
            'image'=>'',
            'location'=>$request->location,
            'num_day'=>$request->num_day,
            'departure_day'=>$request->departure_day,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category
        ]);
        $path = $request->image->store('upload/tour/'.$p->id, 'public');
        $p->image=$path;
        $p->save();
        return redirect()->route('tours.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        $this->loadImage($tour);
        return view('tours.tour-show',['p'=>$tour]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        $this->loadImage($tour);
        $lst=Category::all();
        return view('tours.tour-edit',['p'=>$tour, 'lst'=>$lst]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourRequest $request, Tour $tour)
    {
        //kiểm tra ảnh có được cập nhật không
        $path=$tour->image;
        if ($request->hasFile('image') && $request->image->isValid()) {
            // Xử lý tệp tin ảnh đã tải lên ở đây
            $path=$request->image->store('upload/tour/'.$tour->id, 'public');
        }
        $tour->fill([
            'name'=>$request->name,
            'image'=>$path,
            'location'=>$request->location,
            'num_day'=>$request->num_day,
            'departure_day'=>$request->departure_day,
            'category_id'=>$request->category,
            'description'=>$request->description,
            'price'=>$request->price,
            'status'=>$request->status,
        ]);
        $tour->save();
        // return redirect()->route('tours.show', ['tour'=>$tour]);
        return redirect()->route('tours.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
