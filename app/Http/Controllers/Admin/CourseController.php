<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourse;
use App\Http\Requests\Course\UpdateRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(config('constants.page_limit.course'));

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $data = $request->all();
        unset($data['image_url']);
        $file = $request->file('image_url');
        $extension = $file->getClientOriginalExtension();
        $slug = Str::slug($data['title'], '-');
        $fileName = getFileName($slug, $extension);
        $file->storeAs(config('upload.path.course'), $fileName, config('upload.disk_name'));
        $data['image_url'] = $fileName;

        Course::create($data);

        return redirect()->route('courses.index')->with('success', __('success.create_course'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $course = Course::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return back()->withError($e->getMessage())->withInput();
        }

        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        $data = $request->all();

        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $extension = $file->getClientOriginalExtension();
            $slug = Str::slug($data['title']);
            $fileName = getFileName($slug, $extension);
            $file->storeAs(config('upload.path.course'), $fileName, config('upload.disk_name'));
            $data['image_url'] = $fileName;
        }

        try {
            $course = Course::findOrFail($id)->update($data);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('courses.index')->withError($exception->getMessage())->withInput();
        }

        return redirect()->route('courses.index')->with('success', __('success.update_course'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);

        return redirect()->route('courses.index')->with('success', __('success.delete_course'));
    }
}
