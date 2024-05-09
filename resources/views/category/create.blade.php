@extends('layouts.main',['title'=>'Category'])
@section('content')
<x-content :title="[
 'name'=>'Category',
 'icon'=>'fas fa-utensils'
]">
    <div class="row">
        <div class="col-md-6">
            <form class="card card-primary" action="{{ route('category.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h5 class="card-title">Tambah Category</h5>
                </div>
                <div class="card-body">
                    <x-group>
                        <label>Nama Category</label>
                        <x-input name="nama_kategori" />
                    </x-group>
                </div>
                <div class="card-footer">
                    <x-btn-save />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection
