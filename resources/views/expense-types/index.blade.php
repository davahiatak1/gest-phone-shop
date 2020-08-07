@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title">
                    <h4>Depenses</h4>
                </div>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-create-expense-type">
                    <i class="ti-plus pdd-right-5"></i>
                    <span>Ajouter Depense</span>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <table id="dt-expense-type" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenseTypes as $expenseType)
                                        <tr>
                                            <td>
                                                <div class="checkbox mrg-left-20">
                                                    <input id="expense-type{{ $loop->iteration }}" name="expense-type{{ $loop->iteration }}" type="checkbox">
                                                    <label for="expense-type{{ $loop->iteration }}" ></label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> {{ $expenseType->name }} </span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> {{ $expenseType->description }} </span>
                                                </div>
                                            </td>

                                            <td>
                                                
                                                <div class="mrg-top-10 text-center">
                                                    <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle open-modal-edit-expense-type" data-expense-type="{{ $expenseType }}">
                                                        <i class="ti-pencil"></i>
                                                    </button>

                                                    <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle open-modal-delete-expense-type" data-expense-type="{{ $expenseType }}">
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
        $('#dt-expense-type').DataTable();
    </script>

@endpush
    
