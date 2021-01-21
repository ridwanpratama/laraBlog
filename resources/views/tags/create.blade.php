@extends('layouts.app')
@section('title', 'Add Tags')
@section('pagetitle')
    <h1>Add Tags</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                 <form action="{{ route('save_tags') }}" method="POST">
                   @csrf
                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label @error('tags') class="text-danger" 
                        @enderror>Tag Name @error('tags')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="tags" value="{{ old('tags') }}" class="form-control">
                      </div>
                    </div>

                  </div>
                  <div class="card-footer text-right">
                      <button class="btn btn-primary mr-1" type="submit">Submit</button>
                      <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                 </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
    
@endpush