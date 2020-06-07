@forelse($items as $requirement)

    <div class="container d-inline-block mb-2">
        <label class="switch switch-3d switch-primary">
            <input class="switch-input" onchange="checkedFile(4, {{ $postulant->id }}, {{ $requirement->id }})" type="checkbox" name="{{ $requirement->title }}" {{ ($requirement->requirementFileUser($postulant) != null && $requirement->requirementFileUser($postulant)->checked)? 'checked' : '' }}>
            <span class="switch-slider"></span>
        </label>

        <span> {{ $requirement->description }}</span>
        <div class="pull-right">

            @if($requirement->requirementFileUser($postulant) != null && Auth::user()->hasRole(['Calificador']))
                <a href="{{ asset('storage/'.$requirement->requirementFileUser($postulant)->path) }}" class="btn btn-outline-primary" download>VER</a>
            @else
                <b>Sin archivos</b>
            @endif

        </div>

    </div>

@empty
    <p>Vacio</p>
@endforelse