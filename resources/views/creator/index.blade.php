@extends('layouts.app')

@section('template_title')
    Creator
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Creator') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('creadores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Username</th>
										<th>Phone</th>
										<th>Brand Name</th>
										<th>Landing Conf Json</th>
										<th>Location</th>
										<th>Address</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($creators as $creator)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $creator->username }}</td>
											<td>{{ $creator->phone }}</td>
											<td>{{ $creator->brand_name }}</td>
											<td>{{ $creator->landing_conf_json }}</td>
											<td>{{ $creator->location }}</td>
											<td>{{ $creator->address }}</td>

                                            <td>
                                                <form action="{{ route('creadores.destroy',$creator->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('creadores.show',$creator->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('creadores.edit',$creator->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $creators->links() !!}
            </div>
        </div>
    </div>
@endsection
