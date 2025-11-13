@php use App\Models\User;use Illuminate\Support\Facades\Auth; @endphp
@php
    $user = Auth::user();
    $presentPrice = $present->price ?? 0;
    $contributionsForPresent = $present->contributions;
    $contributionSum = $contributionsForPresent->sum('amount');
    $presentPriceLeft = max($presentPrice - $contributionSum, 0);
    $userContribution = $present->contributions->where('user_id', auth()->id())->first();
@endphp
<article
    class="mb-4 rounded-2xl bg-white border
                               @if($present->price >= 15000) border-[#BC4749]/70 @else border-[#A7C957]/70 @endif
                               shadow-sm hover:shadow-md transition overflow-hidden neuro-box"
>
    <div class="flex flex-col sm:flex-row justify-between gap-4 p-4 sm:p-5">
        {{-- Left side: info --}}
        <div class="space-y-1">
            <div class="flex items-center gap-2">
                <h2 class="text-lg font-bold text-[#386641]">
                    {{ $present->name }}
                </h2>

                @if($present->price >= 15000)
                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-semibold
                                                     bg-[#BC4749] text-[#F2E8CF] uppercase tracking-wide">
                                            Nagyobb ajándék
                    </span>
                @endif
            </div>
            <p class="text-sm font-bold text-[#386641]">
                {{$present->description}}
            </p>
            <p class="text-sm text-[#386641]/80">
                Ajándék
                <span class="font-semibold">
                                        {{ User::find($present->user_id)->name ?? 'Ismeretlen' }}
                                    </span>
                számára
            </p>

            @if($present->link)
                <a href="{{ $present->link }}" target="_blank"
                   class="inline-flex items-center gap-1 text-xs font-semibold text-[#6A994E] hover:text-[#386641] underline underline-offset-2">
                    Termék megnyitása
                </a>
            @endif
        </div>

        {{-- Right side: price + actions --}}
        <div class="flex flex-col items-end justify-between gap-3">
            <div class="text-right">
                <p class="text-xs uppercase text-[#386641]/70 font-semibold">Ár</p>
                <p class="text-xl font-extrabold text-[#386641]">
                    @if($present->price)
                        Teljes ár: {{ number_format($present->price, 0, ',', ' ') }} Ft<br>
                        Maradék összeg: {{ number_format($presentPriceLeft, 0, ',', ' ') }} Ft
                    @else
                        —
                    @endif
                </p>
            </div>

            <div class="flex items-center gap-2">
                {{-- “Bought” checkbox – purely visual, up to you what you do backend-wise --}}
                @if($user?->id == $present->user_id || $user?->admin)
                    <a href="{{ route('presents.edit', $present) }}"
                       class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold
                                                  border border-[#386641]/60 text-[#386641]
                                                  hover:bg-[#386641] hover:text-[#F2E8CF] transition">
                        Szerkesztés
                    </a>
                    <form onsubmit="return confirm('Biztosan törlöd az ajándékod?')"
                          method="POST"
                          action="{{ route('present.delete', ['present' => $present]) }}"
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
                @endif
                @auth
                    @if($userContribution)
                        <form method="POST" action="{{ route('contributions.delete', $userContribution) }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-xs bg-red-500 text-white px-2 py-1 rounded-full">
                                Törlöm a beszállásom
                            </button>
                        </form>
                    @endif
                @endauth
                @auth
                    @if(auth()->id() !== $present->user_id && $presentPriceLeft > 0)
                        <label
                            x-data="{
                show: false,
                contribution: 100,
                price: {{ $presentPriceLeft }},
                amount: Math.round({{ $presentPriceLeft }}), // default 100%
            }"
                            class="inline-flex items-center gap-2 text-xs text-[#386641]/80"
                        >
                            <input
                                type="checkbox"
                                x-model="show"
                                class="rounded border-[#A7C957] text-[#6A994E] focus:ring-[#A7C957]"
                            >
                            Beszállok

                            <div
                                x-show="show"
                                x-transition
                                class="ml-2 flex items-center gap-2"
                            >
                                <form
                                    x-ref="form"
                                    method="POST"
                                    action="{{ route('contributions.store') }}"
                                    class="flex items-center gap-2"
                                >
                                    @csrf

                                    {{-- percent input --}}
                                    <input
                                        type="number"
                                        min="1"
                                        max="100"
                                        x-model.number="contribution"
                                        @input="
                            if (contribution < 1) contribution = 1;
                            if (contribution > 100) contribution = 100;
                            amount = Math.round(price * contribution / 100);
                        "
                                        class="w-20 rounded-md border-[#A7C957] text-[#386641]"
                                    >

                                    {{-- hidden fields for backend --}}
                                    <input type="hidden" name="present_id" value="{{ $present->id }}">
                                    <input type="hidden" name="amount" :value="amount">

                                    Hány százalékban szeretnél beszállni?
                                    (
                                    <span x-text="amount + ' Ft'"></span>
                                    )

                                    <button
                                        type="submit"
                                        class="rounded-full px-3 py-1 text-xs font-semibold border border-[#386641]/60 text-[#386641] hover:bg-[#386641] hover:text-[#F2E8CF] transition"
                                    >
                                        KÜLDÉS
                                    </button>
                                </form>
                            </div>
                        </label>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</article>
