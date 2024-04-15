@extends('layoults.indexlayout')

@section('content')
    <div class="container">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">ÜRÜN ADI</label>
                <input type="text" class="form-control" name="name" required>
                @error('name')
                    <div class="text-danger">Ürün adı alanı boş bırakılamaz.</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">ÜRÜN AÇIKLAMASI</label>
                <input type="text" class="form-control" name="description" required>
                @error('description')
                    <div class="text-danger">Ürün açıklaması alanı boş bırakılamaz.</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">ÜRÜN FİYATI</label>
                <input type="number" class="form-control" name="price" step="0.01" min="0" required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-warning">ÜRÜN EKLE</button>
        </form>
    </div>
@endsection
