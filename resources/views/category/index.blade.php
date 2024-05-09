@extends('layouts.main',['title'=>'Category'])
@section('content')
<x-content :title="[
 'name'=>'Category',
 'icon'=>'fas fa-utensils'
]">

@if (session('status')=='save')
<x-alert-success />
@endif
@if (session('status')=='edit')
<x-alert-success type="edit" />
@endif
@if (session('status')=='delete')
<x-alert-success type="delete" />
@endif
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
                    @php
                    $no = $data->firstItem();
                    @endphp
                    @forelse ( $data as $row )
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama_kategori }}</td>
                        <td class="text-right">
                            <x-btn-act-edit href="{{ route('category.edit',['category'=>$row->id]) }}" />
                            <x-btn-act-delete :data-url="route('category.destroy',['category'=>$row->id])" />
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Data tidak tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </x-table-list>
        </div>
        <div class="card-footer">
        </div>
    </div>
</x-content>
@endsection


<script>
    
</script>
