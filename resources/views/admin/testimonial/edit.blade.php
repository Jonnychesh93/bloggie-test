@extends('layouts.admin')

@section('content')
    <?php $now = Carbon\Carbon::now() ?>

    <div class="panel">
        <div class="header bg-primary pb-6 pt-5 pt-md-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Testimonials</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.testimonial.index') }}">Testimonials</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-sm btn-neutral">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.testimonial.update', $testimonial) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-3">Edit Testimonial</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                @if(count($errors))
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        <p class="mb-0">{{ session('success') }}</p>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label
                                        for="user_name"
                                        class="form-control-label"
                                    >
                                        Full name
                                    </label>
                                    <input
                                        id="user_name"
                                        class="form-control"
                                        name="user_name"
                                        placeholder="Full Name"
                                        required
                                        type="text"
                                        value="{{ old('user_name') ?? $testimonial->user_name ?? ''}}"
                                    />
                                </div>

                                <div class="form-group">
                                    <label
                                        for="rating"
                                        class="form-control-label"
                                    >
                                        Rating
                                    </label>
                                    <select
                                        id="rating"
                                        class="form-control"
                                        name="rating"
                                        required
                                    >
                                        <option value='1' {{old('rating') == 1 ? 'selected' : ($testimonial->rating == 1 ? 'selected' : '')}}>1</option>
                                        <option value='2' {{old('rating') == 2 ? 'selected' : ($testimonial->rating == 2 ? 'selected' : '')}}>2</option>
                                        <option value='3' {{old('rating') == 3 ? 'selected' : ($testimonial->rating == 3 ? 'selected' : '')}}>3</option>
                                        <option value='4' {{old('rating') == 4 ? 'selected' : ($testimonial->rating == 4 ? 'selected' : '')}}>4</option>
                                        <option value='5' {{old('rating') == 5 ? 'selected' : ($testimonial->rating == 5 ? 'selected' : '')}}>5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label
                                        for="message"
                                        class="form-control-label"
                                    >
                                        Message
                                    </label>
                                    <textarea
                                        id="message"
                                        class="form-control"
                                        name="message"
                                        required
                                        rows="5"
                                        type="text"
                                    >{{ old('message') ?? $testimonial->message ?? '' }}</textarea>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer py-4 text-right">
                                <button
                                    class="btn btn-primary"
                                    type="submit"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
