<div class="modal fade" id="modal-create-payment-method" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Ajouter un Moyen de Payement</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('payment-methods.store') }}" id="create-payment-method-form" method="POST">
                	@csrf
                    <div class="form-group">
                        <label>Moyen</label>
                        <input type="text" name="method" placeholder="Enter le nom du moyen" required="" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); document.getElementById('create-payment-method-form').submit();">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')



@endpush