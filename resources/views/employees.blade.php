@extends('layout_menu')

@section('content2')
    <div filter-color="black">
        <div class="container">
            <div class="justify-content-center">
                <div style="display: flex; width: 100%; justify-content: space-between;" class="pb-2">
                    <div></div>
                    <a href="/employees/new">
                        <button class="btn btn-success" type="submit" style="align-self: end;">Añadir empleado</button>
                    </a>
                </div>

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">{{ __('Empleados') }}</div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Puesto</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->position['name'] }}</td>
                                                <td>
                                                    <div style="flex-direction: row; display: flex;">
                                                        <a class="btn btn-warning me-4" title="Editar"
                                                            href={{ '/employees/edit/'.$employee->id }}>
                                                            <i class="fa fa-edit" style="color: white;"></i>
                                                        </a>
                                                        <form method="post" style="py-4" action={{ route('employees') }}>
                                                            @method('delete')
                                                            @csrf
                                                            <input name="id" value={{ $employee->id }} hidden />
                                                            <button type="submit" class="btn btn-danger" title="Eliminar">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
