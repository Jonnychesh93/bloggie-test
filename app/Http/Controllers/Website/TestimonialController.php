<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::query()
            ->orderBy('rating', 'desc')
            ->paginate(12);

        return view('website.testimonials.index')->with([
            'testimonials' => $testimonials
        ]);
    }

}
