@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('cinemas.index')}}">Cinéma</a></li>
@endsection




@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des cinémas
@endsection




@section('content')

    <div class="panel">
        <div class="panel-body">
            <div class="table-primary">
                <div role="grid" id="jq-datatables-example_wrapper" class="dataTables_wrapper form-inline no-footer">

                    <table cellpadding="0" cellspacing="0" border="0"
                           class="table table-striped table-bordered dataTable no-footer" id="jq-datatables-example"
                           aria-describedby="jq-datatables-example_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 15%;">
                                Cinéma
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column ascending" style="width: 193px;">
                                Adresse
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cinema as $salle)
                            <tr class="gradeA odd">
                                <td class="sorting_1" style="font-weight: bold; color: #090E0F">{{ $salle->title }}</td>
                                <td>{{ $salle->adresse }} {{ $salle->cp }} {{ $salle->ville }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection