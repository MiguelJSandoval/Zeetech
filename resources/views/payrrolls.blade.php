@extends('layout_menu')

@section('content2')
    <div filter-color="black">
        <div class="container">
            <div class="justify-content-center">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">{{ __('Nómina') }}</div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Percepciones</th>
                                            <th>Deducciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->position['perceptions'] }}</td>
                                                <td>{{ $employee->position['deductions'] }}</td>
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
