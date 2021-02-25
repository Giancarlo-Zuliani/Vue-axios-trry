@extends ('layouts.main-layout')

@section('content')
    <div class="box" v-for="rest in arr" @click="show(rest.id)">
        <h3>@{{ rest.restaurant_name}}</h3>
    </div>
@endsection