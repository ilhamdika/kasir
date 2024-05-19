@extends('layouts.main',['title'=>'Menu'])
@section('content')
<x-content :title="[
 'name'=>'Menu',
 'icon'=>'fas fa-utensils'
]">

<style>
    .upload-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 20vh;
        min-width: 20vh;
        background-color: #f0f0f0;
    }

    .image-preview {
        position: relative;
        width: 200px;
        height: 200px;
        border: 2px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
    }

    .image-preview img {
        max-width: 100%;
        max-height: 100%;
    }

    .upload-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); 
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: rgba(255, 255, 255, 0.8);
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        border-radius: 50%;
    }

    .upload-label i {
        margin-right: 8px;
        font-size: 1.5em;
    }
</style>

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
                                <label>Nama Barang</label>
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
                            <div class="upload-container">
                                <input name="file_foto" id="imageUpload" type="file" accept="image/*" style="display: none;">
                                <div class="image-preview" id="imagePreview">
                                    <img id="imagePreviewImg" src="{{ $row->foto }}" alt="Image Preview">
                                    <label for="imageUpload" class="upload-label">
                                        <i class="fas fa-plus-circle"></i> Ganti File Foto/Gambar
                                    </label>
                                </div>
                            </div>
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

<script>
    document.getElementById('imageUpload').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(event) {
                const image = document.getElementById('imagePreviewImg');
                image.setAttribute('src', event.target.result);
                image.style.display = 'block';
            };
            
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
