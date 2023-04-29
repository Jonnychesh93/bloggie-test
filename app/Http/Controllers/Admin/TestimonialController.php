<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testimonial\TestimonialStoreRequest;
use App\Http\Requests\Admin\Testimonial\TestimonialUpdateRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::query();

        if ($request->get('search')) {
            $testimonials->where('user_name', 'like', '%' . $request->get('search') . '%');
        }

        $testimonials = $testimonials
            ->orderBy('created_at', 'asc')
            ->paginate();

        return view('admin.testimonial.index')->with([
            'testimonials' => $testimonials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialStoreRequest $request)
    {
        $testimonial = Testimonial::create($request->validated());

        return redirect(route('admin.testimonial.edit', $testimonial))->with([
            'success' => 'Successfully Created Testimonial.'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit')->with([
            'testimonial' =>  $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialUpdateRequest $request, Testimonial $testimonial)
    {
        $testimonial->update($request->validated());
        $testimonial->refresh();

        return redirect(route('admin.testimonial.edit', $testimonial))->with([
            'success' => 'Successfully Edited the Testimonial.'
        ]);
    }
}
