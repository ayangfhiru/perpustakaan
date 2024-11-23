@extends('layouts.main')

@section('content')
    <div class="py-3 space-y-3">
        @if (Route::is('pinjaman'))
            <x-add-link link="{{ route('tambah-pinjaman') }}">Tambah Pinjaman</x-add-link>
        @endif
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Nama Anggota</x-th>
                                    <x-th>Judul Buku</x-th>
                                    <x-th>Tanggal Pinjam</x-th>
                                    <x-th>Tanggal Kembali</x-th>
                                    @if (Route::is('pinjaman'))
                                        <x-th>Action</x-th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($semuaPinjaman) < 1)
                                    <tr class="hover:bg-slate-50 border-b border-slate-200">
                                        <td class="p-4 py-5 font-bold text-xl text-gray-800 text-center" colspan="6">Data
                                            Pinjaman
                                            Tidak Ada</td>
                                    </tr>
                                @else
                                    @foreach ($semuaPinjaman as $pinjaman)
                                        <tr
                                            class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $pinjaman['anggota'][0]['nama_anggota'] }}</x-td>
                                            <x-td>{{ $pinjaman['buku'][0]['judul_buku'] }}</x-td>
                                            <x-td>{{ date('d-m-Y', strtotime($pinjaman['tanggal_pinjam'])) }}</x-td>
                                            <x-td>{{ $pinjaman['tanggal_kembali'] != null ? date('d-m-Y', strtotime($pinjaman['tanggal_kembali'])) : '-' }}</x-td>
                                            @if (Route::is('pinjaman'))
                                                <x-td>
                                                    <x-link link="{{ route('edit-pinjaman', $pinjaman['id_peminjaman']) }}"
                                                        isUpdate>Update</x-link>
                                                    <x-link
                                                        link="{{ route('delete-pinjaman', $pinjaman['id_peminjaman']) }}">Delete</x-link>
                                                </x-td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $semuaPinjaman->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
