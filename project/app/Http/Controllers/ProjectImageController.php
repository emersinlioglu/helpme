<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectImage;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{
    private $projectImageFolder = "assets/images/project/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projectImages = ProjectImage::all();
        return view('admin.sliderlist',compact('projectImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project-image.add', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectImage = new ProjectImage();
        $projectImage->fill($request->all());

        if ($file = $request->file('image')){
            $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
            $projectImage['image'] = $photo_name;

            $filename = $this->projectImageFolder . $projectImage->project_id . DIRECTORY_SEPARATOR;
            $file->move($filename, $photo_name);
        }
        $projectImage->save();
        return redirect("admin/project/{$projectImage->project_id}/edit")->with('message','ProjectImage Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = ProjectImage::findOrFail($id);
        return view('admin.slideredit',compact('slider'));
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
        $slider = ProjectImage::findOrFail($id);
        $data = $request->all();

        if ($file = $request->file('image')){
            $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
            $file->move('assets/images/projectImages',$photo_name);
            $data['image'] = $photo_name;
        }
        $slider->update($data);
        return redirect('admin/projectImages')->with('message','ProjectImage Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectImage = ProjectImage::findOrFail($id);
        $projectImage->delete();
        $filename = $this->projectImageFolder . $projectImage->project_id . DIRECTORY_SEPARATOR . $projectImage->image;
        if (file_exists($filename)) {
            try {
                unlink($filename);
            } catch (Exception $e) {}
        }
        return redirect("admin/project/{$projectImage->project_id}/edit")->with('message','ProjectImage Delete Successfully.');
    }
}
