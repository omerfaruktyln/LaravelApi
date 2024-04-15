@extends('layoults.indexlayout')

@section('content')
    <div class="container">
        <form action="{{ route('product.update', $product['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">ÜRÜN ADI</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $product['name']) }}">
                @error('name')
                    <div class="text-danger">Ürün adı alanı boş bırakılamaz.</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">ÜRÜN AÇIKLAMASI</label>
                <input type="text" class="form-control" name="description" value="{{ old('description', $product['description']) }}">
                @error('description')
                    <div class="text-danger">Ürün açıklaması alanı boş bırakılamaz.</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">ÜRÜN FİYATI</label>
                <input type="number" step="1" class="form-control" name="price" value="{{ old('price', $product['price']) }}">
                @error('price')
                    <div class="text-danger">Ürün fiyatı alanı boş bırakılamaz.</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">ÜRÜN GÜNCELLE</button>
        </form>
    </div>
@endsection

