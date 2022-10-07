@extends('layout_menu')

@section('content2')
    <div filter-color="black">
        <div class="container">
            <div class="justify-content-center">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">{{ __('Alta de empleado') }}</div>
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('employees') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="label">Nombre</label>
                                        <input required autocomplete="off" name="name" class="form-control"
                                            type="text" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Puesto</label>
                                        <br />
                                        <select class="form-select" name="position_id">
                                            @foreach ($positions as $position)
                                                <option value={{ $position->id }}>{{ $position->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Activo</label>
                                        <br />
                                        <select class="form-select" name="active">
                                            <option value="1">
                                                Activo
                                            </option>
                                            <option value="0">
                                                Inactivo
                                            </option>
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
