@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title">
                    <h4>Unité de Mesure</h4>
                </div>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-create-unit-measure">
                    <i class="ti-plus pdd-right-5"></i>
                    <span>Ajouter Unité de Mesure</span>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <table id="dt-unit-measure" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Unité</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($unitMeasures as $unitMeasure)
                                        <tr>
                                            <td>
                                                <div class="checkbox mrg-left-20">
                                                    <input id="unit-measure{{ $loop->iteration }}" name="unitMeasure{{ $loop->iteration }}" type="checkbox">
                                                    <label for="unit-measure{{ $loop->iteration }}" ></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> {{ $unitMeasure->unit }} </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mrg-top-10 text-center">
                                                    <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle open-modal-edit-unit-measure" data-unit-measure="{{ $unitMeasure }}">
                                                        <i class="ti-pencil"></i>
                                                    </button>

                                                    <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle open-modal-delete-unit-measure" data-unit-measure="{{ $unitMeasure }}">
                                                        <i class="ti-trash"></i>
                                                    </button>
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

@endsection

@push('scripts')

    <script>
        $('#dt-unit-measure').DataTable();
    </script>

@endpush
    
