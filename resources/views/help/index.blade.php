<x-app-layout>
    <div class="min-h-screen bg-[#F2E8CF]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-5 space-y-5">

            {{-- Hero / Intro --}}
            <section class="space-y-4 text-center">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-[#386641]">
                    Hogyan működik az ajándékos oldal?
                </h1>
                <p class="max-w-2xl mx-auto text-sm sm:text-base text-[#386641]/80">
                    Ez az oldal azért készült, hogy a karácsonyi ajándékozás <span class="font-semibold">ne legyen káosz</span>.<br>
                    Itt mindenki leírhatja, mit szeretne, mások pedig kiválaszthatják,
                    mit vállalnak be - anélkül, hogy egymás ajándékait lelőnék.
                </p>
            </section>

            {{-- 3-step process --}}
            <section class="grid gap-6 md:grid-cols-3">
                <div class="rounded-2xl bg-white border border-[#A7C957]/70 p-5 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="h-9 w-[1vw] flex items-center justify-center rounded-full bg-[#A7C957] text-[#386641] font-bold">
                            1
                        </span>
                        <h2 class="text-lg font-semibold text-[#386641]">
                            Írd fel, mit szeretnél
                        </h2>
                    </div>
                    <p class="text-sm text-[#386641]/80">
                        A saját oldaladon fel tudod vinni az ajándékötleteidet: név, link, ár, megjegyzés.
                        Gondolj rá úgy, mint egy karácsonyi kívánságlistára.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-[#A7C957]/70 p-5 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="h-9 w-[1vw] flex items-center justify-center rounded-full bg-[#6A994E] text-[#F2E8CF] font-bold">
                            2
                        </span>
                        <h2 class="text-lg font-semibold text-[#386641]">
                            Böngéssz mások listájában
                        </h2>
                    </div>
                    <p class="text-sm text-[#386641]/80">
                        A közös listában látod, ki minek örülne. Kiválaszthatod,
                        mit adnál, és jelezheted, hogy <span class="font-semibold">„Megvan”</span>, hogy más ne vegye meg ugyanazt.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-[#A7C957]/70 p-5 shadow-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="h-9 w-[1vw] flex items-center justify-center rounded-full bg-[#BC4749] text-[#F2E8CF] font-bold">
                            3
                        </span>
                        <h2 class="text-lg font-semibold text-[#386641]">
                            Tartsátok titokban 😉
                        </h2>
                    </div>
                    <p class="text-sm text-[#386641]/80">
                        A lényeg: itt csak szerveztek, nem itt beszélitek meg az ajándékokat.
                        Amit bevállalsz, azt tartsd magadban – a meglepetés attól meglepetés.
                    </p>
                </div>
            </section>

            {{-- How the main list works --}}
            <section class="rounded-3xl bg-white border border-[#A7C957]/70 p-6 sm:p-8 shadow-sm space-y-5">
                <h2 class="text-2xl font-bold text-[#386641] mb-2">
                    Közös lista - mit látsz és mit nem?
                </h2>

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-[#386641]/80">
                            Fő lista (amit mindenki lát)
                        </h3>
                        <ul class="space-y-1 text-sm text-[#386641]/85 list-disc list-inside">
                            <li>Mindenki ajándékötletei</li>
                            <li>Ajándék neve és ára</li>
                            <li>Link a termékhez (ha van)</li>
                            <li>„Megvan” jelölés – hogy ne vegyétek meg ugyanazt</li>
                        </ul>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-[#386641]/80">
                            Amit nem árul el a rendszer
                        </h3>
                        <ul class="space-y-1 text-sm text-[#386641]/85 list-disc list-inside">
                            <li>Ki jelölte be, hogy „Megvan” – ez titok marad</li>
                            <li>A saját ajándékaidnál nem mutatja, hogy valaki bejelölte -e már</li>
                            <li>Ki mit vett konkrétan, amíg az átadás meg nem történik</li>
                            <li>Belső egyezkedések – ezeket beszéljétek meg privátban</li>
                        </ul>
                    </div>
                </div>
            </section>

            {{-- Small "how to behave" / etiquette --}}
            <section class="rounded-3xl bg-[#386641] text-[#F2E8CF] p-6 sm:p-8 space-y-4">
                <h2 class="text-2xl font-bold">
                    Pár egyszerű „játékszabály”
                </h2>
                <ul class="space-y-2 text-sm sm:text-base">
                    <li>• Ha valamit <span class="font-semibold">bevállalsz</span>, jelöld meg „Megvan”-nak.</li>
                    <li>• Ha meggondoltad magad, <span class="font-semibold">szedd ki a pipát</span>, hogy más át tudja venni.</li>
                    <li>• Ne küldd el ezt a linket olyanoknak, akik nem részei a karácsonyi körnek.</li>
                    <li>• Ha bizonytalan vagy, kérdezz rá privátban – ne az ünnepelt előtt. 😄</li>
                </ul>
            </section>

            {{-- CTA back to presents --}}
            <section class="text-center space-y-3">
                <h2 class="text-xl font-bold text-[#386641]">
                    Készen állsz? Irány az ajándéklista!
                </h2>
                <a href="{{ route('presents.index') }}"
                   class="inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold
                          bg-[#BC4749] text-[#F2E8CF] shadow-md shadow-[#BC4749]/40
                          hover:bg-[#a63b3e] transition">
                    Ugrás az ajándékokhoz
                </a>
            </section>

        </div>
    </div>
</x-app-layout>
