<div class="card border-primary mb-3">
    <div class="card-header border-primary text-center"><b>{{ $item->title }}</b></div>
    {{-- <img src="{{ asset('assets/images/adinfondo.jpg') }}" class="card-img-top" alt="..."> --}}
    <div class="card-body" style="position: relative">
        <h5 class="card-title text-white">DESCRIPCION</h5>
        <p class="card-text text-white font-weight-bold">{{ $item->description }}</p>
        <small class="text-muted" style="color: white !important; position: absolute; bottom: 0; right: 10px">Last updated 3 mins ago</small>
    </div>
    <div class="card-footer bg-transparent border-primary">
        <a onclick="show_announcement({{ $item }}, {{ $item->requirements }})" class="btn btn-outline-primary btn-block"><b>Ver convocatoria</b></a>
    </div>
</div>
