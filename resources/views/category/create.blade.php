@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
              </div>
            @endif

            <form action="{{ route('category.store') }}" method="POST">
                @csrf


            <div class="card">
                <div class="card-header">{{ __('Manage Food Category') }}</div>

                <div class="card-body">

                      <!--Create Record-->
                    <div class="form-group">

                        <label for="name">Name</label>                      <!-- highlighted red error     -->
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >

                         <!--error message-->
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>

                    </div>

                </div>
            </div>
         </form>
        </div>
    </div>
</div>
@endsection
