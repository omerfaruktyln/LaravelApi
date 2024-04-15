@extends('layoults.indexlayout')
@section('content')
<div>
  <a  href="{{ route('logout') }}" type='button' class="btn btn-danger" style="float: right">
    <i class="bi bi-box-arrow-left"></i> ÇIKIŞ YAP</a>
</div>
<br>


<div style="display: flex; justify-content: center;padding:20px">
  <a href="{{ route('product.create') }}" type='button' class="btn btn-success">
    <i class="bi bi-file-plus-fill"></i>ÜRÜN EKLE</a>
  </div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ÜRÜN ADI</th>
        <th scope="col">AÇIKLAMA</th>
        <th scope="col">FİYAT</th>
        <th scope="col">AYRINTI GÖSTER</th>
        <th scope="col">DÜZENLE</th>
        <th scope="col">SİL</th>
      </tr>
    </thead>
    <tbody>
        @if ($products)
        @foreach ($products as $product)
            <tr>
          
                <th scope="row">{{ $product['id'] }}</th>
                <td>{{ $product['name']}}</td>
                <td>{{ $product['description'] }}</td>
                <td>{{ $product['price']}}</td>
                <td><a href="{{ route('product.show', $product['id']) }}" type="button" class="btn btn-info"><i class="bi bi-search"></i>GÖSTER</a>
                </td>
                <td><a href="{{ route('product.edit', $product['id']) }}" type="button"
                        class="btn btn-warning">GÜNCELLE</td>
                <td>
                    <form action="{{ route('product.destroy', $product['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Bu ürünü silmek istediğinizden emin misiniz?')"><i class="bi bi-file-minus-fill"></i>ÜRÜN SİL</button>
                    </form>

                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
  </table>
@endsection
