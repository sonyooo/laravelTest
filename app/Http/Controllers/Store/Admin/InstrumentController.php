<?php

namespace App\Http\Controllers\Store\Admin;

use App\Http\Requests\StorePostUpdateRequest;
use App\Http\Requests\BlogInstrumentCreateRequest;
use App\Models\MusicInstrument;
use App\Models\MusicReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class InstrumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = MusicInstrument::paginate(5);

        return view('store.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new MusicInstrument();
        $instrumentList = MusicInstrument::all();

        return view('store.admin.posts.edit',
            compact('item', 'instrumentList'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function saveFile($file)
    {
        $upload_folder = "public/images";
        $name = $file->getClientOriginalName();
        $name = strstr($name, '.', true);
        $extension = $file->getClientOriginalExtension();
        $name = $name.'.'.$extension;
        $path = Storage::putFileAs($upload_folder, $file, $name);

        $path = str_replace('public', 'storage', $path);

        return $path;
    }

    public function store(BlogInstrumentCreateRequest $request)
    {
        $data = $request->input();
        $item = new MusicInstrument($data);
        $item->image = $this->saveFile($request->image);
        $item->save();
        if($item) {
            return redirect()
                ->route('store.admin.posts.edit', [$item->id])
                ->with(['success' => "Успешно сохранено."]);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"])
                ->withInput();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instrument = MusicInstrument::where('id', $id)->first();
        $reviews = $instrument->reviews;
        //dd($reviews);
        return view('store.posts.index', [
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = MusicInstrument::findOrFail($id);
        $instrumentList = MusicInstrument::all();

        return view('store.admin.posts.edit',
            compact('item', 'instrumentList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostUpdateRequest $request, $id)
    {
        $item = MusicInstrument::find($id);

        if(empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена."])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);


        if($result) {
            return redirect()
                ->route('store.admin.posts.edit', $item->id)
                ->with(['success' => "Успешно отправлено."]);
        } else {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена."])
                ->withInput();
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
        $post = MusicInstrument::where('id',$id)->firstOrFail();
        $post->delete();

        return redirect()->route('store.admin.posts.index')
            ->with('success','post deleted successfully');
    }
}
