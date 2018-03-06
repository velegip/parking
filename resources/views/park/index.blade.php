@extends('layouts.app')


@section('title','PArkolások')


@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('park.store') }}" method="post" class="form-inline">
                        @csrf
                        @method("POST")
                        <div class="mr-2 col-6">
                            <label for="plate" class="sr-only">Rendszám</label>
                            <input type="text" name="plate" id="plate" class="form-control form-control-sm" placeholder="Rendszám:">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                <label class="form-check-label" for="inlineFormCheck">
                                    Hosszú távú
                                </label>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-sm btn-primary ">Rögzít</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                  <h5>Jelenleg parkolók: <span>{{ $parks->count() }}</span></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    Parkolások
                </div>
                <div class="card-body">

                    <table class="table table-bordered" id="parks">
                        <thead>
                        <tr>
                            <th>Azonosító</th>
                            <th>Rendszám</th>
                            <th>Hosszú távú</th>
                            <th>Részfizetve</th>
                            <th>Kezdete</th>
                            <th>Lehetőségek</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($parks as $park)
                            <tr>
                                <td>#{{$park->id}}</td>
                                <td>{{ $park->plate }}</td>
                                <td>{{ $park->longterm ? "Igen" : "Nem" }}</td>
                                <td>{{ $park->paid_to }}</td>
                                <td>{{ $park->created_at }}</td>
                                <td>
                                    <form action="{{route('park.update',$park->id)}}" method="post" class="float-left">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" value="{{ $park->longterm ? '0' : '1' }}" name="longterm">
                                        <input type="submit" class="btn btn-sm btn-{{ $park->longterm ? 'info' : 'primary' }} longterm" role="button" value="H.Távú">
                                    </form>
                                    <a href="{{route('park.pay.create',$park->id)}}" class="btn btn-sm btn-success" role="button">Fizetés</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">

        $('#parks').DataTable();

    </script>
@endpush