@extends('layouts.app')

@section('title','Parkolás kifizetése {{ $park->plate  }}')

@section('content')

    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">Parkolás kifizetése: {{ $park->plate }}</div>
            <div class="card-body">
                @if($park->longterm)
                <form action="" method="get" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="paid_to">Előrefizetési dátum:</label>
                        <input type="text" name="paid_to" id="paid_to" class="datepicker form-control form-control-sm" value="{{ old('paid_to') }}">
                    </div>
                    <input type="submit" class="btn btn-info btn-sm">
                </form>
                <hr>
                @endif
                <form action="{{ route('park.pay.store', $park->id) }}">


                </form>
            </div>
        </div>
        </div>
    </div>

@endsection
