@extends('layouts.main',['title'=>'Category'])
@section('content')
<x-content :title="[
 'name'=>'Category',
 'icon'=>'fas fa-utensils'
]">
    <div class="row">
        <div class="col-md-6">
            <form class="card card-primary" action="{{ route('category.update',$data->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h5 class="card-title">Edit Category {{$data->nama_kategori}}</h5>
                </div>
                <div class="card-body">
                    <x-group>
                        <label>Nama Category</label>
                        <x-input name="nama_kategori" :value="$data->nama_kategori"/>
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
