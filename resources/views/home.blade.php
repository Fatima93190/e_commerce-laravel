@extends('layouts.app')

@section('title', 'Accueil - Amazof')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="jumbotron bg-light p-5 rounded-3 mb-5">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Bienvenue dans Amazof</h1>
            <p class="col-md-8 fs-4">Découvrez notre sélection de produits de qualité</p>
        </div>
    </div>

    <!-- Products Section -->
    <div class="row">
        <div class="col-12 mb-4">
            <h2 class="text-center mb-4">Nos Produits</h2>
            <hr class="w-25 mx-auto mb-5">
        </div>
    </div>

    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->name }}"
                             style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge bg-secondary">{{ $product->category->name }}</span>
                            </div>
                            
                            <h5 class="card-title">{{ $product->name }}</h5>
                            
                            <p class="card-text text-muted flex-grow-1">
                                {{ $product->description }}
                            </p>
                            
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h5 text-primary mb-0">{{ $product->formatted_price }}</span>
                                    <button class="btn btn-primary" onclick="addToCart('{{ $product->id }}')">
                                        <i class="fas fa-shopping-cart me-1"></i>
                                        Ajouter au panier
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('showProduct', ['slug' => $product->slug]) }}">Voir</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-2"></i>
                    Aucun produit disponible pour le moment.
                </div>
            </div>
        </div>
    @endif
</div>

<script>
function addToCart(productId) {
    // Ici vous pouvez implémenter la logique d'ajout au panier
    alert('Produit ajouté au panier ! (ID: ' + productId + ')');
    
    // Exemple d'implémentation AJAX pour plus tard :
    /*
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Produit ajouté au panier !');
        }
    });
    */
}
</script>
@endsection