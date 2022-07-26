@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body text-center">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
            </div>
        </div>
    </div>
    <div class="row my-3 align-items-center">
        <div class="col-12 col-md-6">
            <img class="img-fluid py-2" src="{{asset('/storage/uploads/creaappartamento.png')}}" alt="">
        </div>
        <div class="col-12 col-md-6">
            <p class="font-weight-bold">Inserisci sulla piattaforma tutti gli appartamenti che vuoi, fittali e trai guadagno da quelle quattro mura fetenti che ti ritrovi sfruttando la gente che te la pulisce e chiedendo anche soldi extra per le pulizie!</p>
            <a class="btn btn-link my-3 text-decoration-none"href="{{route('admin.apartments.create')}}"><i class="fa-solid fa-house-chimney"></i> Crea appartamento</a>
        </div>
    </div>
    <div class="row my-3 align-items-center py-3">
         <div class="col-12 col-md-6">
            <img class="img-fluid py-2" src="{{asset('/storage/uploads/modificaappartamenti.png')}}" alt="">
        </div>
        <div class="col-12 col-md-6">
            <p class="font-weight-bold">Ora che hai inserito i tuoi fottuti appartamenti, modificali secondo i cambiamenti apportati, aggiungi immagini nuove e  se purtroppo è andato a fuoco cancellalo!</p>
            <a class="btn btn-link my-3 text-decoration-none"href="{{route('admin.apartments.index')}}"><i class="fa-solid fa-magnifying-glass"></i> Visualizza i tuoi appartamenti</a>
        </div>
    </div>
    <div class="row my-3 align-items-center py-3">
        <div class="col-12 col-md-6">
            <img class="img-fluid py-2" src="{{asset('/storage/uploads/sponsorizza.png')}}" alt="">
        </div>
        <div class="col-12 col-md-6">
            <p class="font-weight-bold">Metti in risalto il tuo appartamento dato che fa cagare e non lo fitta mai nessuno, un buon modo di fare l'imprenditore, bravo!COGLIONE!</p>
            <a class="btn btn-link my-3 text-decoration-none"href="{{route('admin.sponsorships.index')}}"><i class="fa-solid fa-magnifying-glass-dollar"></i> Sponsorizza un appartamento</a>
        </div>
    </div>
</div>


@endsection
