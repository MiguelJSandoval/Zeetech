@extends('layout_menu')

@section('content2')
    <div filter-color="black">
        <div class="container">
            <div class="justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Alta de puesto') }}</div>
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('positions') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="label">Nombre</label>
                                        <input required autocomplete="off" name="name" class="form-control"
                                            type="text" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Salario</label>
                                        <input required autocomplete="off" name="salary" class="form-control"
                                            type="number" step=".01" placeholder="Salario">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Gratificación</label>
                                        <input required autocomplete="off" name="bonus" class="form-control"
                                            type="number" step=".01" placeholder="Monto de la gratificación">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Despensa</label>
                                        <input required autocomplete="off" name="pantry" class="form-control"
                                            type="number" step=".01" placeholder="Monto de la despensa">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">ISR</label>
                                        <input required autocomplete="off" name="isr" class="form-control"
                                            type="number" step=".01" placeholder="Monto sel ISR">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Seguro</label>
                                        <input required autocomplete="off" name="assurance" class="form-control"
                                            type="number" step=".01" placeholder="Monto del seguro">
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
