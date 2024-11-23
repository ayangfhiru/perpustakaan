@extends('layouts.main')

@section('content')
    <div class="pb-5">
        <form action="{{ route('post-edit-anggota', $anggota['id_anggota']) }}" method="POST">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Informasi Anggota</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <x-input class="sm:col-span-3" name="nama_anggota" title="Nama Anggota"
                            value="{{ $anggota['nama_anggota'] }}" />
                        <x-input class="sm:col-span-3" name="nomor_telepon" title="Nomor Telepon"
                            value="{{ $anggota['nomor_telepon'] }}" />
                        <x-input name="alamat" title="Alamat" value="{{ $anggota['alamat'] }}" />
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-link link="{{ route('anggota') }}">Cancel</x-link>
                <x-button>Save</x-button>
            </div>
        </form>
    </div>
@endsection
