@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-deck">
        @foreach($user->charactercollection as $collection)
        <div class="card" style="text-align: center; height: 35rem;">
            <div class="card-title">Level: {{var_dump($user->charactercollection)}}</div>
            <div class="card-title">Name: {{$user->charactercollection->characters_id}}</div>
            <img src="/images/diluc.jpg" style="height: 65%; width: 65%; margin-left: auto; margin-right: auto;">
            <div class="form-group">
                <div class="form-group-row">
                    <label class="col-sm-5">ATK</label>
                    <label class="col-sm-5">HP</label>
                </div>
                <div class="form-group-row">
                    <label class="col-sm-5">xxx</label>
                    <label class="col-sm-5">xxx</label>
                </div>
                <div class="form-group-row">
                    <label class="col-sm-5">DEF</label>
                    <label class="col-sm-5">SPC</label>
                </div>
                <div class="form-group-row">
                    <label class="col-sm-5">xxx</label>
                    <label class="col-sm-5">xxx</label>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
