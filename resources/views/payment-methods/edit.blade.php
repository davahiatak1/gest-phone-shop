<div class="modal fade" id="modal-edit-payment-method" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Modifier le Moyen de Payement</h4>
            </div>
            <div class="modal-body">
                <form action="" id="edit-payment-method-form" method="POST">
                	@csrf
                    @method("PUT")
                    <div class="form-group">
                        <label>Methode</label>
                        <input type="text" name="method" placeholder="Nom du moyen" class="form-control">
                    </div>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(); document.getElementById('edit-payment-method-form').submit();">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $(".open-modal-edit-payment-method").on('click', function(event) {
            event.preventDefault();

            var paymentMethod = $(this).data('paymentMethod');

            $("#modal-edit-payment-method").modal();

            var form = $("#edit-payment-method-form");

            form.attr('action', location.origin + '/payment-methods/'+ paymentMethod.id);

            form.find("input[name=method]").val(paymentMethod.method);
            
        });
    </script>


@endpush