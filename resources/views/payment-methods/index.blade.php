@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title">
                    <h4>Monyen de payement</h4>
                </div>
            </div>
            <div class="col-6">
                <a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-create-payment-method">
                    <i class="ti-plus pdd-right-5"></i>
                    <span>Ajouter Monyen de payement</span>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow">
                            <table id="dt-payment-method" class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Methode</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($paymentMethods as $paymentMethod)
                                        <tr>
                                            <td>
                                                <div class="checkbox mrg-left-20">
                                                    <input id="payment-method{{ $loop->iteration }}" name="paymentMethod{{ $loop->iteration }}" type="checkbox">
                                                    <label for="payment-method{{ $loop->iteration }}" ></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mrg-top-15">
                                                    <span> {{ $paymentMethod->method }} </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mrg-top-10 text-center">
                                                    <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle open-modal-edit-payment-method" data-payment-method="{{ $paymentMethod }}">
                                                        <i class="ti-pencil"></i>
                                                    </button>

                                                    <button class="btn btn-icon btn-flat btn-rounded dropdown-toggle open-modal-delete-payment-method" data-payment-method="{{ $paymentMethod }}">
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
        $('#dt-payment-method').DataTable();
    </script>

@endpush
    
