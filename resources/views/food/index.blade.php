@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Food') }}

                    <span class="float-right">
                        <a href="{{ route('food.create') }}">

                            <button class="btn btn-outline-secondary">
                                Add Food

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
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($foods)>0)
                            @foreach ($foods as $key=>$food )
                          <tr>
                            <td> <img src="{{ asset('images') }}/{{ $food->image }}" width="100"> </td>
                            <td>{{  $food->name }}</td>
                            <td>{{  $food->description }}</td>
                            <td>${{  $food->price }}</td>
                            <td>{{  $food->category->name}}</td>
                            <td>
                                <a href="{{ route('food.edit',[$food->id]) }}">
                                    <button class="btn btn-outline-success">Edit</button>
                                </a>
                            </td>
                            <td>



                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$food->id  }}">
                                Delete
                            </button>


                     <!--  Modal -->
                        <div class="modal fade" id="exampleModal{{ $food->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <!-- Delete Form -->
                                <form action="{{ route('food.destroy',[$food->id ]) }}" method="POST">
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
                          <td>No Food to Display</td>
                          @endif
                        </tbody>
                      </table>

                      {{-- paginate links  --}}

                      {{ $foods->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
