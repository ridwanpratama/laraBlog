@extends('layouts.app')
@section('title', 'Posts')
@section('pagetitle')
    <h1>Posts</h1>
@endsection
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('create_post') }}" class="btn btn-icon icon-left btn-primary"><i
                        class="far fa-edit"></i>Add Post</a>
                <hr>
                <div class="card">
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>x</span>
                                    </button>
                                    {{ session('message') }}
                                </div>
                            </div>
                        @elseif (session('delete'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>x</span>
                                    </button>
                                    {{ session('delete') }}
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered dataTable display" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Featured Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('image/' . $item->image) }}" height="60px" alt=""
                                                    srcset=""></td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->tags->tags }}</td>
                                            <td>{{ $item->author }}</td>
                                            <td style="display: flex">
                                                <a href="{{ url('edit_post', $item->id) }}"
                                                    class="badge badge-warning mt-2 mx-1"><button type="submit"
                                                        class="border-0 bg-transparent text-white">Edit</button></a>
                                                <form action="{{ url('delete_post', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="badge badge-danger mt-2"><button type="submit"
                                                            class="border-0 bg-transparent text-white"
                                                            onclick="return confirm('Yakin hapus data?')">Delete</button></a>
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
        </div>
    </div>
@endsection

@push('page-scripts')

@endpush

@push('after-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();
        });

    </script>
@endpush
