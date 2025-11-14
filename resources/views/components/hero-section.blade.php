<section class="min-h-[100vh] bg-[#F2E8CF] items-center justify-center ">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 flex flex-col lg:flex-row items-center gap-10">

        <!-- Left: Text -->
        <div class="flex-1 space-y-6">
      <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold tracking-wide
                   bg-[#A7C957] text-[#386641] uppercase">
        🎄 Karácsonyi kiadás
      </span>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#386641] leading-tight">
                Kedves ajándékok.<br>
                <span class="text-[#BC4749]">Szép emlékek.</span>
            </h1>

            <p class="text-base sm:text-lg text-[#386641]/80 max-w-xl">
                Teremts meghitt karácsonyi hangulatot a válogatott ajándékokkal, ünnepi hangulattal és nulla stresszel.<br>
                Böngéssz, válassz, és az ajándékozás öröme Téged is megtalál!
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-2">
                <a href="/presents"
                   class="inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold
                  bg-[#BC4749] text-[#F2E8CF] shadow-md shadow-[#BC4749]/30
                  hover:bg-[#a63b3e] transition">
                    Nézzük az ajándékokat!
                </a>

                <a href="/help"
                   class="inline-flex items-center justify-center px-6 py-3 rounded-full text-sm font-semibold
                  border border-[#386641] text-[#386641]
                  hover:bg-[#386641] hover:text-[#F2E8CF] transition">
                    Hogyan működik?
                </a>
            </div>
        </div>

        <!-- Right: Card / Image placeholder -->
        <div class="flex-1 w-full">
            <div class="relative max-w-md mx-auto">
                <!-- Background blob -->
                <div class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-[#6A994E] via-[#A7C957] to-[#BC4749] opacity-30 blur-xl"></div>

                <!-- Main card -->
                <div class="relative rounded-3xl bg-[#386641] text-[#F2E8CF] p-6 sm:p-8 shadow-xl">
                    <img src="{{ asset('images/karacsony.webp') }}" alt="">
                </div>
            </div>
        </div>

    </div>
</section>
