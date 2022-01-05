@extends('layouts.app')

@section('template_title')
    Partner
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Partner') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('socios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Partner Id</th>
										<th>Brand Name</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partners as $partner)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $partner->partner_id }}</td>
											<td>{{ $partner->brand_name }}</td>
											<td>{{ $partner->address }}</td>
											<td>{{ $partner->phone }}</td>
											<td>{{ $partner->email }}</td>

                                            <td>
                                                <form action="{{ route('socios.destroy',$partner->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('socios.show',$partner->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('socios.edit',$partner->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $partners->links() !!}
            </div>
        </div>
    </div>
@endsection
