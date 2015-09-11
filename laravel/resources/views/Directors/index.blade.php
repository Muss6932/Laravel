@extends('layout')




@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des Réalisateurs
@endsection




@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('directors.index')}}">Réalisateurs</a></li>
@endsection




@section('content')


    <div class="panel">
        <div class="panel-body">
            <div class="table-primary">
                <div role="grid" id="jq-datatables-example_wrapper" class="dataTables_wrapper form-inline no-footer">

                    <table cellpadding="0" cellspacing="0" border="0"
                           class="table table-striped table-bordered dataTable no-footer list" id="jq-datatables-example"
                           aria-describedby="jq-datatables-example_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10%;">
                                Image
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column ascending" style="width: 193px;">
                                Nom
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 80px;">Naissance
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 150px;">Biographie
                            </th>
                            <th style="width: 10%;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($directors as $director)
                            <tr class="gradeA odd">
                                <td><a href="{{ route('directors.read', [ 'id' => $director->id ] ) }}"><img
                                                style="width: 100%" src="{{ $director->image }}" alt=""></a></td>
                                <td class="sorting_1" style="font-weight: bold; color: #090E0F"><a
                                            href="{{ route('actors.read', [ 'id' => $director->id ] ) }}">{{ $director->firstname }} {{ $director->lastname }}</a>
                                </td>
                                <td>{{ $director->dob }}</td>
                                <td class="center">{{ $director->biography }}</td>
                                <td>
                                    <a href="{{ route('directors.update', [ 'id' => $director->id ] ) }}" style="width: 100%;" class="btn btn-default"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier</a>
                                    <a href="{{ route('directors.delete', [ 'id' => $director->id ] ) }}" style="width: 100%;" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection

