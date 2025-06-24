@extends('layouts.app')

@section('title', 'Produit - Amazof')

@section('content')
<div class="container py-5">
    <a href="{{ route('home') }}" class="btn btn-outline-secondary mb-4">
        &larr; Retour à la liste des produits
    </a>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-4 overflow-hidden">
                <img src="{{ asset('storage/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="w-100"
                     style="height: 500px; object-fit: cover;">

                <div class="card-body p-4">
                    <h2 class="card-title fw-bold mb-3">
                        {{ $product->name }}
                    </h2>

                    <h4 class="text-primary fw-semibold mb-3">
                        {{ $product->formatted_price }}
                    </h4>

                    <p class="text-muted mb-4">
                        {{ $product->description }}
                    </p>

                    <div class="mb-3 d-flex align-items-center gap-3">
                        <label for="quantity" class="mb-0 fw-semibold">Quantité :</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="form-control w-25">
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-dark px-3 py-2 rounded-pill">
                            Catégorie : {{ $product->category->name }}
                        </span>

                        <button class="btn btn-success px-4"
                                onclick="addToCart('{{ $product->id }}', document.getElementById('quantity').value)">
                            <i class="fas fa-shopping-cart me-2"></i> Ajouter au panier
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addToCart(productId, quantity) {
        // À adapter selon ta logique JS/API ou Livewire/Ajax
        alert(`Produit ${productId} ajouté au panier (Quantité : ${quantity})`);
    }
</script>
@endsection
