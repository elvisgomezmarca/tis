<div class="form-row">

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="title">Titulo</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">T</button>
            </span>
            <input
                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                    name="title"
                    placeholder="Ingrese Titulo" type="text"  value="{{ old('title', isset($requirement) ? $requirement->title : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('title')? 'd-block' : '' }}">
            {{ $errors->has('title')? $errors->first('title') : 'El campo de Titulo es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="description">Descripcion</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">D</button>
            </span>
            <textarea
                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    name="description"
                    placeholder="Ingrese una descripcion" type="text">{{ old('description', isset($requirement) ? $requirement->description : '') }}</textarea>
        </div>

        <div class="invalid-feedback {{ $errors->has('description')? 'd-block' : '' }}">
            {{ $errors->has('description')? $errors->first('description') : 'El campo de Nombre es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="required">Tipo de requisito</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">S</button>
            </span>

            <select class="form-control {{ $errors->has('required') ? 'is-invalid' : '' }}" name="required">
                <option disabled hidden selected>Seleccione requisito</option>
                <option value=1 {{ ( isset($requirement) && $requirement->required == true) ? 'selected' : '' }}>INDISPENSABLE</option>
                <option value=0 {{ ( isset($requirement) && $requirement->required == false) ? 'selected' : '' }}>GENERAL</option>
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('required')? 'd-block' : '' }}">
            {{ $errors->has('gender')? $errors->first('required') : 'El campo de genero es requerido'  }}
        </div>
    </div>
</div>
