@extends('layout_menu')

@section('content2')
    <div filter-color="black">
        <div class="container">
            <div class="justify-content-center">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">{{ __('Editar empleado') }}</div>
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('employees', [$employee]) }}">
                                    @method('PUT')
                                    @csrf
                                    <input name="id" value={{ $employee->id }} style="display: none;" />
                                    <div class="form-group">
                                        <label class="label">Nombre</label>
                                        <input required autocomplete="off" name="name" class="form-control"
                                            type="text" placeholder="Nombre" value={{ $employee->name }}>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Puesto</label>
                                        <br />
                                        <select class="form-select" name="position_id">
                                            @foreach ($positions as $position)
                                                @if ($employee->position_id == $position->id)
                                                    <option value={{ $position->id }} selected>{{ $position->name }}
                                                    </option>
                                                @else
                                                    <option value={{ $position->id }}>{{ $position->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Activo</label>
                                        <br />
                                        <select class="form-select" name="active">
                                            @if ($employee->active == 1)
                                                <option value="1" selected>
                                                    Activo
                                                </option>
                                                <option value="0">
                                                    Inactivo
                                                </option>
                                            @else
                                                <option value="1" >
                                                    Activo
                                                </option>
                                                <option value="0" selected>
                                                    Inactivo
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                    <button class="btn btn-success" type="submit">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
