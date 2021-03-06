@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Category') }}


                    <span class="float-right">
                        <a href="{{ route('category.create') }}">

                            <button class="btn btn-outline-secondary">
                                Add Category

                            </button>

                        </a>

                    </span>



                </div>

                <div class="card-body">

                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message') }}
                      </div>
                    @endif



                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($categories)>0)
                            @foreach ($categories as $key=>$Category )
                          <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{  $Category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit',[$Category->id]) }}">
                                    <button class="btn btn-outline-success">Edit</button>
                                </a>
                            </td>
                            <td>



                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$Category->id  }}">
                                Delete
                            </button>


                     <!--  Modal -->
                        <div class="modal fade" id="exampleModal{{ $Category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <!-- Delete Form -->
                                <form action="{{ route('category.destroy',[$Category->id ]) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                            <!--End Delete Form -->


                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                              Are You Sure
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button  type="submit" class="btn btn-outline-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                           <!-- End Modal -->

                            </td>
                          </tr>
                          @endforeach
                          @else
                          <td>No Category to Display</td>
                          @endif
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
