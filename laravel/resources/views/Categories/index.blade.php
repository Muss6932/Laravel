@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('categories.index')}}">Catégories</a></li>
@endsection



@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des catégories
@endsection



@section('content')

    <div class="row">
        <div class="col-sm-7">
            <div class="alert alert-danger">
                <strong>  catégories</strong> qui ont aucun film.
            </div>
            <div class="alert alert-info">
                <strong>catégorie</strong> est la plus populaire <i>(films)</i>
            </div>
            <div class="alert alert-warning">
                <strong>catégories</strong> a le plus gros budget de l'année <i>2015</i> : 1000000$
            </div>
        </div>
        <div class="col-sm-5">
            <div class="stat-panel">
                <div class="stat-cell bg-danger valign-middle">
                    <!-- Stat panel bg icon -->
                    <i class="fa fa-film bg-icon"></i>
                    <!-- Big text -->
                    <span class="text-bg">Comments</span><br>
                </div>
                <!-- /.stat-row -->
                <div class="stat-row">
                    <div class="col-sm-4">
                        <div class="stat-cell  no-border-t text-center">
                            <p class=" text-lg"><strong>4:50</strong></p>
                            <small>PM</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-cell  no-border-t text-center">
                            <p class=" text-lg"><strong>4:50</strong></p>
                            <small>PM</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-cell  no-border-t text-center">
                            <p class=" text-lg"><strong>4:50</strong></p>
                            <small>PM</small>
                        </div>
                    </div>

                </div>
                <!-- /.stat-row -->
            </div>
        </div>
    </div>



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
                                aria-label="Browser: activate to sort column ascending" style="width: 15%;">Image
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column ascending" style="width: 193px;">
                                 Catégorie
                            </th>
                            <th style="width: 10%;">Films</th>
                            <th style="width: 10%;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $categorie)
                            <tr class="gradeA odd">
                                <td><img style="width: 100%; height: 70px" src="{{ $categorie->image }}" alt=""></td>
                                <td class="sorting_1"
                                    style="font-weight: bold; color: #090E0F">{{ $categorie->title }} </td>
                                <td class="sorting_1">  @if($categorie->movies->count() == 1){{ $categorie->movies->count() }} film
                                                        @else {{ $categorie->movies->count() }} films
                                                        @endif&nbsp;&nbsp;<i class="fa fa-film"></i></td>
                                <td>
                                    <a href="{{ route('categories.update', [ 'id' => $categorie->id ] ) }}" style="width: 100%;" class="btn btn-default"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier</a>
                                    <a href="{{ route('categories.delete', [ 'id' => $categorie->id ] ) }}" style="width: 100%;" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection