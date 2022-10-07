@extends('layout_menu')

@section('content2')
    <div filter-color="black">
        <div class="container">
            <div class="justify-content-center">
                <div style="display: flex; width: 100%; justify-content: space-between;" class="pb-2">
                    <div></div>
                    <a href="/employees/pdf">
                        <button class="btn btn-success" type="submit" style="align-self: end;">Generar PDF</button>
                    </a>
                </div>

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">{{ __('Reporte de empleados activos') }}</div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Sueldo bruto</th>
                                            <th>Sueldo neto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->position['perceptions'] + $employee->position['deductions']  }}</td>
                                                <td>{{ $employee->position['perceptions'] - $employee->position['deductions'] }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            
                                            <td>Total</td>
                                            <td>{{ $sum_perceptions }}</td>
                                            <td>{{ $sum_deductions }}</td>
                                        </tr>
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
