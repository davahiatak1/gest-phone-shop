<div class="modal fade" id="modal-delete-payment-method" style="top: 50px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Supprimer le Moyen de Payement</h4>
            </div>
            <div class="modal-body">
                <form action="" id="delete-payment-method-form" method="POST">
                	@csrf
                    @method("DELETE")
                    <p class="">Voulez-vous vraiment supprimer le moyen ?</p>

                </form>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-payment-method-form').submit();">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script>
        $(".open-modal-delete-payment-method").on('click', function(event) {
            event.preventDefault();

            var paymentMethod = $(this).data('paymentMethod');

            $("#modal-delete-payment-method").modal();

            var form = $("#delete-payment-method-form");

            form.attr('action', location.origin + '/payment-methods/'+ paymentMethod.id);
            
        });
    </script>


@endpush