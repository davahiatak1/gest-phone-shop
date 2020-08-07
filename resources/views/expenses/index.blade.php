@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            {{-- {{ dd($errors->all()) }} --}}
            <div class="col-6">
                <div class="page-title">
                    <h4>Depenses</h4>
                </div>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-create-expense">
                    <i class="ti-plus pdd-right-5"></i>
                    <span>Ajouter Une Depense</span>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <table id="dt-expense" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Categorie</th>
                                        <th>Amount</th>
                                        <th>Reçue</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenses as $expense)
                                        <tr>
                                            <td>
                                                <div class="checkbox mrg-left-20">
                                                    <input id="expense{{ $loop->iteration }}" name="expense{{ $loop->iteration }}" type="checkbox">
                                                    <label for="expense{{ $loop->iteration }}" ></label>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> {{ $expense->date }} </span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> {{ $expense->description }} </span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> {{ ($expense->expenseType->name)??"" }} </span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> {{ $expense->amount }} </span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> </span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="mrg-top-10 text-center">
                                                    <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle open-modal-edit-expense" data-expense="{{ $expense }}">
                                                        <i class="ti-pencil"></i>
                                                    </button>

                                                    <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle open-modal-delete-expense" data-expense="{{ $expense }}">
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
        $('#dt-expense').DataTable();
    </script>

@endpush
    
