@extends('layouts.main',['title'=>'Menu'])
@section('content')
<x-content :title="[
 'name'=>'Menu',
 'icon'=>'fas fa-utensils'
]">
    <div class="row">
        <div class="col-md-12">
            <form class="card card-primary" action="{{ route('menu.update',['menu'=>$row->id]) }}" method="POST"
                enctype="multipart/form-data">
                <div class="card-header">
                    <h5 class="card-title">Ubah Menu</h5>
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            
                            <x-group>
                                <label>Nama Menu</label>
                                <x-input name="nama_menu" :value="$row->nama_menu" />
                            </x-group>
                            <x-group>
                                <label>Harga</label>
                                <x-input name="harga" type="number" :value="$row->harga" />
                            </x-group>
                            <x-group>
                                <label>Stok</label>
                                <x-input name="stok" type="number" :value="$row->stok" />
                            </x-group>
                        </div>
                        <div class="col-md-6">
                            <x-group>
                                <img src="{{ $row->foto }}" class="img-flud w-10" />
                            </x-group>
                            <x-group>
                                <label>Ganti File Foto/Gambar</label>
                                <x-input name="file_foto" type="file" />
                            </x-group>
                            <x-group>
                                <label>Kategori</label>
                                <select name="kategori" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->nama_kategori }}" @if($item->nama_kategori == $row->kategori) selected @endif>{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </x-group>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <x-btn-update />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection
