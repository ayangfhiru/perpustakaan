@extends('layouts.main')

@section('content')
    <div class="py-3 space-y-3">
        <x-add-link link="{{ route('tambah-buku') }}">Tambah Buku</x-add-link>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Judul Buku</x-th>
                                    <x-th>Penulis</x-th>
                                    <x-th>Tahun Terbit</x-th>
                                    <x-th>Action</x-th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaBuku as $buku)
                                    <tr
                                        class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                        <x-td>{{ $loop->iteration }}</x-td>
                                        <x-td>{{ $buku['judul_buku'] }}</x-td>
                                        <x-td>{{ $buku['penulis'] }}</x-td>
                                        <x-td>{{ $buku['tahun'] }}</x-td>
                                        <x-td>
                                            <x-link link="{{ route('edit-buku', $buku['id_buku']) }}"
                                                isUpdate>Update</x-link>
                                            <x-link link="{{ route('delete-buku', $buku['id_buku']) }}">Delete</x-link>
                                        </x-td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $semuaBuku->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
