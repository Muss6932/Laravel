@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('categories.index')}}">Catégories</a></li>
@endsection



@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des catégories
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
                                colspan="1"
                                aria-label="Browser: activate to sort column ascending" style="width: 10%;">Catégorie
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column ascending" style="width: 193px;">
                                Image
                            </th>
                            <th style="width: 21%;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $categorie)
                            <tr class="gradeA odd">
                                <td><img style="width: 100%" src="{{ $categorie->image }}" alt=""></td>
                                <td class="sorting_1"
                                    style="font-weight: bold; color: #090E0F">{{ $categorie->title }} </td>
                                <td>
                                    <a href="{{ route('categories.update', [ 'id' => $categorie->id ] ) }}">
                                        <button type="button" class="btn btn-default"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier
                                        </button>
                                    </a>
                                    <a href="{{ route('categories.delete', [ 'id' => $categorie->id ] ) }}">
                                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer
                                        </button>
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection