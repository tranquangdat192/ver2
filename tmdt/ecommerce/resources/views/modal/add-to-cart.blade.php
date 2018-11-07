<div class="modal fade" id="add-to-cart-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="row">
                    <h1>Add to cart success</h1>
                </div>
            </div>
            <div class="modal-footer text-center">
                <a href="{{ route('shopping-cart') }}">
                    <div class="button text-center">
                        <div class="background-button">
                            <span>Proceed checkout</span>
                        </div>
                    </div>
                </a>
                <div class="button text-center" data-dismiss="modal" aria-label="Close">
                    <div class="background-button">
                        <span>Continue shopping</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>