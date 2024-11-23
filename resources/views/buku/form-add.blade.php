@extends('layouts.main')

@section('content')
    <form action="{{ route('post-buku') }}" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Informasi Buku</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-input name="judul_buku" title="Judul Buku" />
                    <x-input class="sm:col-span-3" name="penulis" title="Penulis" />
                    <x-input class="sm:col-span-3" name="tahun" title="Tahun Terbit" />
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-link link="{{ route('buku') }}">Cancel</x-link>
            <x-button>Save</x-button>
        </div>
    </form>
@endsection
