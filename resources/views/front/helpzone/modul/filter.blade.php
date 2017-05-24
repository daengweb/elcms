<div class="filter">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                {!! Form::open(['url' => 'cari', 'method' => 'GET', 'class' => 'filter__search']) !!}
                    {!! Form::text('q', old('q'), ['placeholder' => 'Apa yang anda cari ?']) !!}
                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                {!! Form::close() !!}
            </div>

            <div class="col-xs-12 col-sm-8 col-md-9">
                <ul class="sort">
                    <li>Filter:</li>
                    <li><a class="active" href="#">All</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>