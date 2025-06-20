<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-3">
        <a href="{{ route('products.index') }}" class="text-decoration-none text-dark fw-bold">Daftar Produk</a>
        <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark fw-bold">Tambah Produk</a>
    </div>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label class="block font-medium text-sm text-gray-700">Nama Produk</label>
                <input type="text" name="name" required class="mt-1 block w-full border rounded p-2">
            </div>

            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                <textarea name="description" required class="mt-1 block w-full border rounded p-2"></textarea>
            </div>

            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700">Harga</label>
                <input type="number" name="price" required class="mt-1 block w-full border rounded p-2">
            </div>

            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700">Upload Gambar</label>
                <input type="file" name="image" accept="image/*" required class="mt-1 block w-full border rounded p-2">
            </div>

            <div class="mt-4">
                <button type="submit" style="background-color: #052659;" class="text-white rounded px-4 py-2">Simpan</button>

            </div>
        </form>
    </div>
</x-app-layout>
