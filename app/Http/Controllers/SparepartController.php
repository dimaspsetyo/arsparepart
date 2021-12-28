<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spareparts = Sparepart::all();
        $var_title = "ARSparepart | Data Sparepart";
        return view('admin.sparepart', compact('var_title'), ['spareparts' => $spareparts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $var_title = "ARSparepart | Tambah Data Sparepart";
        return view('admin.create', compact('var_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'kodeSP' => 'required',
            'namaSP' => 'required',
            'fileObjek' => 'required'
        ]);

        // ambil data
        $fileObjek = $request->file('fileObjek');
        // define nama img
        $namaObjek = time() . "_" . $fileObjek->getClientOriginalName();
        // define public path
        $uploadObjek = 'upload/objek/';
        $fileObjek->move($uploadObjek, $namaObjek);

        if ($request->hasFile('fileVideo')) {
            $fileVideo = $request->file('fileVideo');
            $namaVideo = time() . "_" . $fileVideo->getClientOriginalName();
            $uploadVideo = 'upload/video/';
            $fileVideo->move($uploadVideo, $namaVideo);
        } else {
            $namaVideo = '';
        }

        Sparepart::create([
            'kodeSP' => $request->kodeSP,
            'namaSP' => $request->namaSP,
            'fileObjek' => $namaObjek,
            'fileVideo' => $namaVideo

        ]);

        return redirect('sparepart')->with(['toast_success' => 'Data Berhasil Ditambahkan!']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sparepart = Sparepart::find($id);

        $var_title = "ARSparepart | Detail Sparepart";
        return view('admin.show', compact('var_title'), compact('sparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $sparepart = Sparepart::find($id);

        $var_title = "ARSparepart | Ubah Data Sparepart";
        return view('admin.edit', compact('var_title'), compact('sparepart'));
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

        $sparepart = Sparepart::find($id);

        // define public path
        $uploadObjek = 'upload/objek/';
        $uploadVideo = 'upload/video/';

        // update file pada folder local 

        if ($request->hasFile('fileObjek')) {
            //// ambil data
            $fileObjek = $request->file('fileObjek');
            //// define nama file
            $namaObjek = time() . "_" . $fileObjek->getClientOriginalName();
            //// ganti file pada folder local
            $request->fileObjek->move($uploadObjek, $namaObjek);
            // data update ke DB
            $objek = [
                'fileObjek' => $namaObjek
            ];
            $sparepart->update($objek);
        }
        if ($request->hasFile('fileVideo')) {
            //// ambil data
            $fileVideo = $request->file('fileVideo');
            //// define nama file
            $namaVideo = time() . "_" . $fileVideo->getClientOriginalName();
            //// ganti file pada folder local
            $request->fileVideo->move($uploadVideo, $namaVideo);
            // data update ke DB
            $video = [
                'fileVideo' => $namaVideo
            ];
            $sparepart->update($video);
        }

        // data update ke DB
        $data = [
            'kodeSP' => $request['kodeSP'],
            'namaSP' => $request['namaSP'],
        ];

        $sparepart->update($data);

        return redirect('sparepart')->with(['toast_success' => 'Data Berhasil Diubah!']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $sparepart = Sparepart::find($id);
        $fileObjek = public_path('/upload/objek/') . $sparepart->fileObjek;
        $fileVideo = public_path('/upload/video/') . $sparepart->fileVideo;

        if (file_exists($fileObjek)) {
            @unlink($fileObjek);
            if (file_exists($fileVideo)) {
                @unlink($fileVideo);
            }
        }

        $sparepart->delete();

        return redirect('sparepart')->with(['toast_success' => 'Data Berhasil Dihapus!']);
    }
}
