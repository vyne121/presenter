<x-app-layout>
    <div class="min-h-screen bg-[#F2E8CF]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            {{-- Back --}}
            <div class="mb-6">
                <a href="{{ route('presents.index') }}"
                   class="inline-flex items-center gap-2 text-sm font-medium text-[#386641] hover:text-[#6A994E]">
                    <span class="text-lg">&larr;</span>
                    Vissza az ajándéklistához
                </a>
            </div>

            {{-- Card --}}
            <div class="rounded-3xl bg-white shadow-xl border border-[#A7C957]/70 overflow-hidden">
                <div class="h-2 w-full bg-gradient-to-r from-[#386641] via-[#A7C957] to-[#BC4749]"></div>

                <div class="p-6 sm:p-8 space-y-6">
                    <header class="space-y-2">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#386641]">
                            Új ajándék hozzáadása
                        </h1>
                        <p class="text-sm text-[#386641]/80">
                            Írd le, minek örülnél – név, link, ár, megjegyzés. A többit bízd a többiekre. 🎄
                        </p>
                    </header>

                    {{-- Validation errors --}}
                    @if ($errors->any())
                        <div class="rounded-2xl border border-[#BC4749]/60 bg-[#BC4749]/10 p-4 text-sm text-[#BC4749]">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('presents.store') }}" class="space-y-5">
                        @csrf

                        {{-- Name --}}
                        <div class="space-y-1">
                            <label for="name" class="block text-sm font-medium text-[#386641]">
                                Ajándék neve <span class="text-[#BC4749]">*</span>
                            </label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                required
                                value="{{ old('name') }}"
                                class="block w-full rounded-xl border border-[#A7C957]/70 bg-[#F2E8CF]/60
                                       px-3 py-2 text-sm text-[#386641]
                                       focus:outline-none focus:ring-2 focus:ring-[#A7C957] focus:border-transparent"
                                placeholder="Pl.: Puha takaró, illatgyertya, könyv..."
                            >
                        </div>

                        {{-- Link --}}
                        <div class="space-y-1">
                            <label for="link" class="block text-sm font-medium text-[#386641]">
                                Link a termékhez (opcionális)
                            </label>
                            <input
                                id="link"
                                name="link"
                                type="url"
                                value="{{ old('link') }}"
                                class="block w-full rounded-xl border border-[#A7C957]/70 bg-[#F2E8CF]/60
                                       px-3 py-2 text-sm text-[#386641]
                                       focus:outline-none focus:ring-2 focus:ring-[#A7C957] focus:border-transparent"
                                placeholder="https://..."
                            >
                        </div>

                        {{-- Price --}}
                        <div class="space-y-1">
                            <label for="price" class="block text-sm font-medium text-[#386641]">
                                Becsült ár (Ft, opcionális)
                            </label>
                            <input
                                id="price"
                                name="price"
                                type="number"
                                min="0"
                                step="100"
                                value="{{ old('price') }}"
                                class="block w-full max-w-xs rounded-xl border border-[#A7C957]/70 bg-[#F2E8CF]/60
                                       px-3 py-2 text-sm text-[#386641]
                                       focus:outline-none focus:ring-2 focus:ring-[#A7C957] focus:border-transparent"
                                placeholder="Pl.: 5000"
                            >
                        </div>

                        {{-- Description --}}
                        <div class="space-y-1">
                            <label for="description" class="block text-sm font-medium text-[#386641]">
                                Megjegyzés (opcionális)
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                                class="block w-full rounded-xl border border-[#A7C957]/70 bg-[#F2E8CF]/60
                                       px-3 py-2 text-sm text-[#386641]
                                       focus:outline-none focus:ring-2 focus:ring-[#A7C957] focus:border-transparent"
                                placeholder="Pl.: Szín, méret, márka, egyéb infó..."
                            >{{ old('description') }}</textarea>
                        </div>

                        {{-- Actions --}}
                        <div class="pt-3 flex flex-wrap items-center gap-3 justify-between">
                            <p class="text-xs text-[#386641]/70">
                                A listát később bármikor szerkesztheted.
                            </p>

                            <div class="flex gap-3">
                                <a href="{{ route('presents.index') }}"
                                   class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-semibold
                                          border border-[#386641]/60 text-[#386641]
                                          hover:bg-[#386641] hover:text-[#F2E8CF] transition">
                                    Mégsem
                                </a>
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold
                                           bg-[#BC4749] text-[#F2E8CF] shadow-md shadow-[#BC4749]/40
                                           hover:bg-[#a63b3e] transition">
                                    Ajándék hozzáadása
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
