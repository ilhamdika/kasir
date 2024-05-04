@extends('layouts.main',['title'=>'Category'])
@section('content')
<x-content :title="[
 'name'=>'Category',
 'icon'=>'fas fa-utensils'
]">
<div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <x-btn-add href="{{ route('category.create') }}" />
                </div>
                <div class="col">
                    <x-form-search name="search" />
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <x-table-list>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Kategori</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </x-table-list>
        </div>
        <div class="card-footer">
        </div>
    </div>
</x-content>
@endsection
