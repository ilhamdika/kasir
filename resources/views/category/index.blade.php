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
                        <th>Status</th>
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
                        <td>{{ $row->status }}</td>
                        <td class="text-right">
                            <x-btn-act-edit href="{{ route('category.edit',['category'=>$row->id]) }}" />
                            <!-- <x-btn-act-delete :data-url="route('category.destroy',['category'=>$row->id])" /> -->
                            @if ($row->status == 'aktif')
                            <x-btn-act-delete onclick="nonaktif({{$row->id}})" />
                            @else
                            <button onclick="aktifkan({{$row->id}})" >
                                aktifkan
                            </button>
                            @endif
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
    function nonaktif(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "menonaktifkan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Nonaktif!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{ route('category.nonaktif') }}",
                    type : "POST",
                    data : {
                        id : id,
                        _token : "{{ csrf_token() }}"
                    },
                    success : function(data) {
                        // console.log(data);
                        // return false;
                        if (data == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Data berhasil dihapus.',
                                'success'
                            )
                        }
                    }
                })
                location.reload();
                
            }
        });
    }


    function aktifkan(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "mengaktifkan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Aktifkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url : "{{ route('category.aktif') }}",
                    type : "POST",
                    data : {
                        id : id,
                        _token : "{{ csrf_token() }}"
                    },
                    success : function(data) {
                        // console.log(data);
                        // return false;
                        if (data == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Data berhasil dihapus.',
                                'success'
                            )
                        }
                    }
                })
                location.reload();
            }
        });
    }
    
</script>
