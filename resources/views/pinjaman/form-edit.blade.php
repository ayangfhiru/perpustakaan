@extends('layouts.main')

@section('content')
    <form action="{{ route('post-edit-pinjaman', $pinjaman['id_peminjaman']) }}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Tambah Peminjaman Buku</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="judul_buku" class="block text-sm/6 font-medium text-gray-900">Judul Buku</label>
                        <div class="mt-2">
                            <select name="judul_buku" id="judul_buku" value="{{ old('judul_buku') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                <option value="{{ $pinjaman->buku[0]->id_buku }}">{{ $pinjaman->buku[0]->judul_buku }}
                                    @foreach ($buku as $item)
                                <option value="{{ $item['id_buku'] }}">{{ $item['judul_buku'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="nama_anggota" class="block text-sm/6 font-medium text-gray-900">Nama Anggota</label>
                        <div class="mt-2">
                            <select name="nama_anggota" id="nama_anggota" value="{{ old('nama_anggota') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                                <option value="{{ $pinjaman->anggota[0]->id_anggota }}">
                                    {{ $pinjaman->anggota[0]->nama_anggota }}
                                </option>
                                @foreach ($anggota as $item)
                                    <option value="{{ $item['id_anggota'] }}">{{ $item['nama_anggota'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="tanggal_pinjam" class="block text-sm/6 font-medium text-gray-900">Tanggal Pinjam</label>
                        <div class="mt-2">
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                                value="{{ date('Y-m-d', strtotime($pinjaman['tanggal_pinjam'])) }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="tanggal_pengembalian" class="block text-sm/6 font-medium text-gray-900">Tanggal
                            Pengembalian</label>
                        <div class="mt-2">
                            <input id="tanggal_pengembalian" name="tanggal_pengembalian" type="date"
                                value="{{ old('tanggal_pengembalian') }}"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-link link="{{ route('pinjaman') }}">Cancel</x-link>
            <x-button>Save</x-button>
        </div>
    </form>
@endsection
