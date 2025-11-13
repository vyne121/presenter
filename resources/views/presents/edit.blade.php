<x-app-layout>
    <div class="min-h-screen bg-[#F2E8CF]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            {{-- Back --}}
            <div class="mb-6 flex items-center justify-between gap-2">
                <a href="{{ route('presents.my') }}"
                   class="inline-flex items-center gap-2 text-sm font-medium text-[#386641] hover:text-[#6A994E]">
                    <span class="text-lg">&larr;</span>
                    Vissza a saját ajándékaimhoz
                </a>

                <span class="text-xs text-[#386641]/70">
                    Ajándék ID: {{ $present->id }}
                </span>
            </div>

            {{-- Card --}}
            <div class="rounded-3xl bg-white shadow-xl border border-[#A7C957]/70 overflow-hidden">
                <div class="h-2 w-full bg-gradient-to-r from-[#386641] via-[#A7C957] to-[#BC4749]"></div>

                <div class="p-6 sm:p-8 space-y-6">
                    <header class="space-y-1">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#386641]">
                            Ajándék szerkesztése
                        </h1>
                        <p class="text-sm text-[#386641]/80">
                            Módosítsd az adatokat, ha közben meggondoltad magad, vagy találtál jobb linket / árat.
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

                    <form method="POST" action="{{ route('presents.update', $present) }}" class="space-y-5">
                        @csrf
                        @method('PUT')

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
                                value="{{ old('name', $present->name) }}"
                                class="block w-full rounded-xl border border-[#A7C957]/70 bg-[#F2E8CF]/60
                                       px-3 py-2 text-sm text-[#386641]
                                       focus:outline-none focus:ring-2 focus:ring-[#A7C957] focus:border-transparent"
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
                                value="{{ old('link', $present->link) }}"
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
                                value="{{ old('price', $present->price) }}"
                                class="block w-full max-w-xs rounded-xl border border-[#A7C957]/70 bg-[#F2E8CF]/60
                                       px-3 py-2 text-sm text-[#386641]
                                       focus:outline-none focus:ring-2 focus:ring-[#A7C957] focus:border-transparent"
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
                            >{{ old('description', $present->description) }}</textarea>
                        </div>

                        {{-- Actions --}}
                        <div class="pt-4 flex flex-wrap items-center justify-between gap-3 border-t border-[#A7C957]/40">
                            <p class="text-xs text-[#386641]/70">
                                Utolsó módosítás: {{ $present->updated_at?->format('Y.m.d H:i') }}
                            </p>

                            <div class="flex flex-wrap gap-3 items-center">
                                <a href="{{ route('presents.my') }}"
                                   class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-semibold
                                          border border-[#386641]/60 text-[#386641]
                                          hover:bg-[#386641] hover:text-[#F2E8CF] transition">
                                    Mégsem
                                </a>

                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold
                                           bg-[#6A994E] text-[#F2E8CF] shadow-md shadow-[#6A994E]/40
                                           hover:bg-[#386641] transition">
                                    Változtatások mentése
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
