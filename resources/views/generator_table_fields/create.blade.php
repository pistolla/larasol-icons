<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <div id="main">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">
                    <a href="{{route('generator_tables.generator_table.index')}}">Tables </a>
                    <i style="color:#ddd;" class="glyphicon glyphicon-arrow-right"></i>
                    {{$table}}
                    <i style="color:#ddd;" class="glyphicon glyphicon-arrow-right"></i>
                    Add field
                </h4>
            </span>

            <div class="me-3 my-3 text-end" role="group">
                <a href="{{ route('generator_table_fields.generator_table_field.index', ['table' => $tableId]) }}" class="btn btn-primary" title="Afficher tous les Generator Table Field">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('generator_table_fields.generator_table_field.store') }}" accept-charset="UTF-8" id="create_generator_table_field_form" name="create_generator_table_field_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('generator_table_fields.form', [
                                        'generatorTableField' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Ajouter">
                    </div>
                </div>

            </form>

        </div>
    </div>
    <x-footers.auth></x-footers.auth>
</div>
    </div>
</x-layout>


