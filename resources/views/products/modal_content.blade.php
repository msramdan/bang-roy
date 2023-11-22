<!-- product/modal_content.blade.php -->

<div class="row">
    <div class="col-lg-6 col-xs-12">
        <div class="quick-view-img">
            <center>
                <img src="{{ asset('storage/uploads/photos/' . $product->photo) }}" alt="" class="img-fluid">
            </center>

        </div>
    </div>
    <div class="col-lg-6 rtl-text">
        <div class="product-right">
            <h2>{{ $product->nama }}</h2>
            <h3>{{ rupiah($product->harga) }}</h3>
            <div class="border-product">
                <p class="product-title">Product Details</p>
                <p style="text-align: justify">{{ $product->keterangan }}</p>
            </div>
            <div class="product-buttons">
                <a href="https://wa.me/{{ setting_web()->no_whatsapp }}?text=Hello%20Admin,%0ASaya%20ingin%20bertanya%20terkait%20product%20{{ urlencode($product->nama) }}"
                    class="btn btn-solid" style="color: white" target="_blank">Order Via WhatsApp</a>
            </div>
        </div>
    </div>
</div>
