@extends('layouts.main')

@section('content')
    <div class="py-3 space-y-3">
        <x-add-link link="{{ route('tambah-anggota') }}">Tambah Anggota</x-add-link>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Nama Anggota</x-th>
                                    <x-th>Alamat</x-th>
                                    <x-th>Nomor Telepon</x-th>
                                    <x-th>Action</x-th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaAnggota as $anggota)
                                    <tr
                                        class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                        <x-td>{{ $loop->iteration }}</x-td>
                                        <x-td>{{ $anggota['nama_anggota'] }}</x-td>
                                        <x-td>{{ $anggota['alamat'] }}</x-td>
                                        <x-td>{{ $anggota['nomor_telepon'] }}</x-td>
                                        <x-td>
                                            <x-link link="{{ route('edit-anggota', $anggota['id_anggota']) }}"
                                                isUpdate>Update</x-link>
                                            <x-link
                                                link="{{ route('delete-anggota', $anggota['id_anggota']) }}">Delete</x-link>
                                        </x-td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $semuaAnggota->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
