@extends('layoults.indexlayout')
@section('content')
    <div class="container">
        <form>

            <div class="mb-3">
                <label class="form-label">ÜRÜN ADI</label>
                <input type="text" class="form-control" name="name" value="{{ $product['name'] }}" readonly>

            </div>
            <div class="mb-3">
                <label class="form-label">ÜRÜN AÇIKLAMASI</label>
                <input type="text" class="form-control" name="description" value="{{ $product['description'] }}" readonly>

            </div>
            <div class="mb-3">
                <label class="form-label">ÜRÜN FİYATI</label>
                <input type="text" class="form-control" name="price" value="{{ $product['price'] }}" readonly>

            </div>
            <div class="mb-3">
                <label class="form-label">OLUŞTURULMA TARİHİ</label>
                <input type="text" class="form-control" name="created_at" value="{{ $product['created_at'] }}" readonly>

            </div>

        </form>
    </div>
    @endsection
 