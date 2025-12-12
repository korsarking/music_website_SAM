<div class="max-w-xl mx-auto py-16 mt-12">

    <div class="bg-white/5 backdrop-blur-xl rounded-2xl p-8 border border-white/10">

        <h2 class="text-4xl text-center mb-6 font-extrabold text-gray-900 dark:text-white">
            Your Card
        </h2>

        <form wire:submit.prevent="pay">

            <input type="text"
                   placeholder="Card number"
                   class="w-full mb-4 px-5 py-4 rounded-xl bg-black/40 text-white border border-white/10">

            <div class="grid grid-cols-2 gap-4 mb-4">
                <input type="text" placeholder="MM / YY"
                       class="px-5 py-4 rounded-xl bg-black/40 text-white border border-white/10">

                <input type="text" placeholder="CVC"
                       class="px-5 py-4 rounded-xl bg-black/40 text-white border border-white/10">
            </div>

            <button type="submit"
                    class="w-full mt-4 py-4 bg-indigo-600 hover:bg-indigo-500 rounded-xl text-white font-bold text-xl transition cursor-pointer">
                Pay {{ number_format($total, 2) }} $
            </button>
        </form>
    </div>

</div>

