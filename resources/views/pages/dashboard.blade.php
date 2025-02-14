@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class=" col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                                {{-- {{$allData->count()}} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>News</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card card-statistic-1">
                            <div class="card-header">
                                <h4>Simple</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>                                            <th scope="col">ID</th>
                                            <th scope="col">ID</th>                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">email</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <?php $a = 1 ?>
                    @foreach($data as $item)
                    <tbody>
                        <tr>
                            <th scope ='row'><?= $a++ ?></th>
                            <th>{{$item->id ?? '' }}</th>
                            <th>{{$item->name ?? 'no data'}}</th>
                            <th>{{$item->email ?? 'no data'}}</th>
                            <th>
                                <form action="/" method="POST" class="d-inline ml-1">
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                    <button type="hidden" value="EDIT" name="_method" class="btn btn-sm btn-primary btn-icon"
                                        data-toggle="tooltip" title="Edit">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <i class="fas fa-pencil"></i>
                                    </button>
                                </form>
                                <form action="{{ route('userWeb.destroy', $item->id) }}" method="POST" class="d-inline ml-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="hidden" value="DELETE" name="_method" class="btn btn-sm btn-danger btn-icon"
                                        data-toggle="tooltip" title="Delete">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </th>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class='row'>
                    <pre>
                        {{-- {{var_dump($doa)}} --}}
                    </pre>
                </div>
                {{-- @foreach($data as $item) --}}
                <div class="float-right mt-3 mb-3 card-footer page-item disa ">
                    {{ $data->withQueryString()->links() }}
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
