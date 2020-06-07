<div class="form-row">

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="name">Nombre</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">N</button>
            </span>
            <input
                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    name="name"
                    placeholder="Ingrese Nombre" type="text"  value="{{ old('name', isset($user) ? $user->name : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('name')? 'd-block' : '' }}">
            {{ $errors->has('name')? $errors->first('name') : 'El campo de Nombre es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="lastname">Apellido</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">A</button>
            </span>
            <input
                    class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                    name="lastname"
                    placeholder="Ingrese apellido " type="text" value="{{ old('lastname', isset($user) ? $user->lastname : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('lastname')? 'd-block' : '' }}">
            {{ $errors->has('lastname')? $errors->first('lastname') : 'El campo de Apellido es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="ci">C.I:</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">CI</button>
            </span>
            <input
                    class="form-control {{ $errors->has('ci') ? 'is-invalid' : '' }}"
                    name="ci"
                    placeholder="Carnet Identidad" type="text"  value="{{ old('ci', isset($user) ? $user->ci : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('ci')? 'd-block' : '' }}">
            {{ $errors->has('ci')? $errors->first('ci') : 'El campo de C.I es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="cod_sis">Cod SIS.</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">SIS</button>
            </span>
            <input
                    class="form-control {{ $errors->has('cod_sis') ? 'is-invalid' : '' }}"
                    name="cod_sis"
                    placeholder="Código SIS " type="text" value="{{ old('cod_sis', isset($user) ? $user->cod_sis : '') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('cod_sis')? 'd-block' : '' }}">
            {{ $errors->has('cod_sis')? $errors->first('cod_sis') : 'El campo de Cod. SIS es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="sex">Sexo</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">S</button>
            </span>

            <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" type="text">
                <option disabled hidden selected>Seleccione sexo</option>
                <option value="M" {{ ( old('gender', isset($user) && $user->gender == 'M') ? 'selected' : '') }}>MASCULINO</option>
                <option value="F" {{ ( old('gender', isset($user) && $user->gender == 'F') ? 'selected' : '') }}>FEMENINO</option>
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('gender')? 'd-block' : '' }}">
            {{ $errors->has('gender')? $errors->first('gender') : 'El campo de genero es requerido'  }}
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="email">E-mail</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">@</button>
            </span>

            <input
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    name="email"
                    placeholder="Ingrese email" type="text" value="{{ old('email', isset($user) ? $user->email : '' ) }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('email')? 'd-block' : '' }}">
            {{ $errors->has('email')? $errors->first('email') : 'El campo de E-mail es requerido'  }}
        </div>
    </div>

    {{-- @if(!isset($user)) --}}
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="password">Password</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">P</button>
            </span>

            <input
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    name="password"
                    placeholder="Ingrese una contrasenia" type="text" value="{{ old('password') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('password')? 'd-block' : '' }}">
            {{ $errors->has('password')? $errors->first('password') : 'El campo de Password es requerido'  }}
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="confirm_password">Confirm Password</label>
        <div class="input-group">
            <span class="input-group-append">
                <button class="btn btn-primary" type="button">CP</button>
            </span>

            <input
                    class="form-control {{ $errors->has('password_confirm') ? 'is-invalid' : '' }}"
                    name="password_confirm"
                    placeholder="Confirme su contrasenia" type="text" value="{{ old('password_confirm') }}">
        </div>

        <div class="invalid-feedback {{ $errors->has('password_confirm')? 'd-block' : '' }}">
            {{ $errors->has('password_confirm')? $errors->first('password_confirm') : 'Este campo es requerido'  }}
        </div>
    </div>
    {{-- @endif --}}

    <div class="col-md-12 mb-3">
        <label class="col-form-label" for="roles">Roles</label>
        <div class="input-group">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary" type="button">R</button>
                                                </span>
            <select class="form-control js-example-basic-multiple {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" multiple="multiple">
                @foreach($roles as $item)
                    <option value="{{ $item->name }}" {{ (isset($user) && $user->roles->contains('name', $item->name)) ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="invalid-feedback {{ $errors->has('roles')? 'd-block' : '' }}">
            {{ $errors->has('roles')? $errors->first('roles') : 'Este campo es requerido'  }}
        </div>
    </div>
</div>