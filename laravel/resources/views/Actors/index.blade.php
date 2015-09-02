@extends('layout')




@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des acteurs
@endsection




@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('actors.index')}}">Acteurs</a></li>
@endsection




@section('content')



    <div class="panel">
        <div class="panel-body">
            <div class="table-primary">
                <div role="grid" id="jq-datatables-example_wrapper" class="dataTables_wrapper form-inline no-footer">

                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable no-footer" id="jq-datatables-example" aria-describedby="jq-datatables-example_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10%;">Image </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="jq-datatables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 193px;">Nom</th>
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 80px;">Naissance</th>
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">Ville</th>
                            <th style="width: 10%;"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($actors as $actor)
                            <tr class="gradeA odd">
                                <td><a href="{{ route('actors.read', [ 'id' => $actor->id ] ) }}"><img style="width: 100%" src="{{ $actor->image }}" alt=""></a></td>
                                <td class="sorting_1" style="font-weight: bold; color: #090E0F"><a href="{{ route('actors.read', [ 'id' => $actor->id ] ) }}">{{ $actor->firstname }} {{ $actor->lastname }}</a></td>
                                <td>{{ $actor->dob }}</td>
                                <td class="center">{{ $actor->city }}</td>
                                <td>
                                    <a href="{{ route('actors.update', [ 'id' => $actor->id ] ) }}"><button type="button" style="width: 100%" class="btn btn-default"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier</button>
                                    </a>
                                    <a href="{{ route('actors.delete', [ 'id' => $actor->id ] ) }}"><button type="button" style="width: 100%" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer</button>
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>


@endsection

