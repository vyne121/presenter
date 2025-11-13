<x-app-layout>
    <div class="min-h-screen bg-[#F2E8CF]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

            {{-- Header --}}
            <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-[#386641]">
                        Ajándéklista
                    </h1>
                    <p class="mt-2 text-sm text-[#386641]/80">
                        Itt látod a már felvett ajándékokat. Böngéssz, szállj be ajándékokba,
                        és tartsd kézben a karácsonyi káoszt.
                    </p>
                </div>

                <a href="{{ route('presents.create') }}"
                   class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold
                          bg-[#BC4749] text-[#F2E8CF] shadow-md shadow-[#BC4749]/30
                          hover:bg-[#a63b3e] transition">
                    + Új ajándék
                </a>
            </header>

            <div>
                @if ($errors->any())
                    <div class="bg-[#BC4749]/10 border border-[#BC4749] rounded-lg p-4 mb-6">
                        <div class="text-sm text-[#BC4749]">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-[#A7C957]/10 border border-[#A7C957] rounded-lg p-4 mb-6">
                        <div class="text-sm text-[#386641]">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
            </div>

            {{-- Filters / Search --}}
            <section
                class="bg-white rounded-2xl shadow-md border border-[#BC4749]/50 p-4 sm:p-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between neuro-box">
                <form method="GET" class="w-full sm:w-auto flex items-center gap-2">
                    <input
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Ajándék vagy személy keresése..."
                        class="w-full sm:w-72 rounded-full border border-[#A7C957]/70 bg-[#F2E8CF]/60
                               px-4 py-2 text-sm text-[#386641]
                               focus:outline-none focus:ring-2 focus:ring-[#A7C957] focus:border-transparent"
                    />
                    <button
                        class="inline-flex items-center rounded-full px-4 py-2 text-xs font-semibold
                               bg-[#6A994E] text-[#F2E8CF] hover:bg-[#56813f] transition">
                        Keresés
                    </button>
                </form>

                {{-- Tiny legend --}}
                <div class="flex flex-wrap items-center gap-3 text-xs text-[#386641]/80">
                    <div class="flex items-center gap-1">
                        <span class="h-2 w-2 rounded-full bg-[#A7C957]"></span>
                        <span>Elérhető</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="h-2 w-2 rounded-full bg-[#BC4749]"></span>
                        <span>Drágább tétel</span>
                    </div>
                </div>
            </section>

            {{-- Presents list --}}
            <section>
                @forelse($presents as $present)
                    <x-present-element :present="$present"/>
                @empty
                    <div class="mt-8 rounded-2xl bg-white border border-dashed border-[#A7C957]/70 p-8 text-center">
                        <p class="text-sm text-[#386641]/80 mb-2">
                            Még nincs egyetlen ajándék sem a listában.
                        </p>
                        <a href="{{ route('presents.create') }}"
                           class="inline-flex items-center rounded-full px-5 py-2 text-sm font-semibold
                                  bg-[#6A994E] text-[#F2E8CF] hover:bg-[#56813f] transition">
                            + Adj hozzá egyet!
                        </a>
                    </div>
                @endforelse
            </section>

            {{-- Pagination --}}
            @if(method_exists($presents, 'links'))
                <div class="pt-4">
                    {{ $presents->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
