@extends('layouts.app')
@section('title', 'Dashboard')
@section('pagetitle')
    <h1>Dashboard</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            100
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
                            <h4>Total Post</h4>
                        </div>
                        <div class="card-body">
                            100
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
                            <h4>Total Tags</h4>
                        </div>
                        <div class="card-body">
                            100
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
                            <h4>Total View</h4>
                        </div>
                        <div class="card-body">
                            100
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Latest Posts</h4>
            <div class="card-header-action">
                <a href="{{ route('post') }}" class="btn btn-primary">View All</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestPost as $item)
                            <tr>
                                <td>
                                    {{ $item->title }}
                                    <div class="table-links">
                                        in <a href="#">{{ $item->tags->tags }}</a>
                                        <div class="bullet"></div>
                                        <a href="/post/{{ $item->slug }}">View</a>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png"
                                            alt="avatar" width="30" class="rounded-circle mr-1"> {{ $item->author }}</a>
                                </td>
                                <td>
                                    <a href="{{ url('edit_post', $item->id) }}" class="btn btn-primary btn-action mr-1 mt-2"
                                        data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fas fa-pencil-alt" style="padding-left: 6px; padding-right:6px"></i></a>

                                    {{-- <a class="btn btn-danger btn-action trigger--fire-modal-1" data-toggle="tooltip"
                                        title=""
                                      ><i
                                            class="fas fa-trash"></i></a> --}}

                                    <form action="{{ url('delete_post', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-danger btn-action mt-2 mb-2">
                                          <button type="submit" class="border-0 bg-transparent text-white"
                                                onclick="return confirm('Yakin hapus data?')"><i
                                                class="fas fa-trash"></i></button></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('page-scripts')

@endpush
