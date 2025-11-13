<x-app-layout>
    <div class="min-h-screen bg-[#F2E8CF]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

            {{-- Header --}}
            <header class="space-y-2">
                <h1 class="text-3xl font-extrabold text-[#386641]">
                    Hozzájárulásaim
                </h1>
                <p class="text-sm text-[#386641]/80">
                    Itt látod azokat az ajándékokat, amelyekbe beszálltál, és hogy mennyivel.
                </p>

                <div class="mt-3 inline-flex items-center gap-2 rounded-full bg-white border border-[#A7C957]/70 px-4 py-2 text-sm text-[#386641] shadow-sm">
                    <span class="text-xs uppercase font-semibold text-[#386641]/70">
                        Összes eddigi hozzájárulásod:
                    </span>
                    <span class="font-bold">
                        {{ number_format($totalAmount, 0, ',', ' ') }} Ft
                    </span>
                </div>
            </header>

            {{-- List --}}
            <section class="space-y-4">
                @forelse($contributions as $contribution)
                    @php
                        $present = $contribution->present;
                    @endphp

                    <article class="rounded-2xl bg-white border border-[#A7C957]/70 shadow-sm hover:shadow-md transition overflow-hidden">
                        <div class="h-1 w-full bg-gradient-to-r from-[#386641] via-[#A7C957] to-[#BC4749]"></div>

                        <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="space-y-1">
                                <h2 class="text-lg font-bold text-[#386641]">
                                    {{ $present->name }}
                                </h2>

                                <p class="text-xs text-[#386641]/70">
                                    Ajándék tulajdonosa:
                                    <span class="font-semibold">
                                        {{ $present->owner->name ?? 'Ismeretlen' }}
                                    </span>
                                </p>

                                @if(!is_null($present->price))
                                    <p class="text-xs text-[#386641]/70">
                                        Teljes ár:
                                        <span class="font-semibold">
                                            {{ number_format($present->price, 0, ',', ' ') }} Ft
                                        </span>
                                    </p>
                                @endif
                            </div>

                            <div class="flex flex-col items-end gap-2">
                                <div class="text-right">
                                    <p class="text-xs uppercase text-[#386641]/70 font-semibold">
                                        A te hozzájárulásod
                                    </p>
                                    <p class="text-xl font-extrabold text-[#386641]">
                                        {{ number_format($contribution->amount, 0, ',', ' ') }} Ft
                                    </p>

                                    @if(!is_null($present->price) && $present->price > 0)
                                        @php
                                            $percent = round(($contribution->amount / $present->price) * 100);
                                        @endphp
                                        <p class="text-xs text-[#386641]/70">
                                            (~{{ $percent }}%)
                                        </p>
                                    @endif
                                </div>
                                <div>
                                    <form onsubmit="return confirm('Biztosan törlöd az ajándékod?')"
                                          method="POST"
                                          action="{{ route('contributions.delete', $contribution) }}"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold
                                                  border border-[#BC4749]/60 text-[#BC4749]
                                                  hover:bg-[#BC4749] hover:text-[#F2E8CF] transition">
                                            Törlés
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="mt-4 rounded-2xl bg-white border border-dashed border-[#A7C957]/70 p-8 text-center">
                        <p class="text-sm text-[#386641]/80 mb-2">
                            Még nem szálltál be egyetlen ajándékba sem.
                        </p>
                            <a href="{{ route('presents.index') }}"
                               class="inline-flex items-center rounded-full px-5 py-2 text-sm font-semibold
                                      bg-[#6A994E] text-[#F2E8CF] hover:bg-[#386641] transition">
                                Nézd meg az ajándékokat
                            </a>
                    </div>
                @endforelse
            </section>

        </div>
    </div>
</x-app-layout>
