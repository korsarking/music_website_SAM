<button
    wire:click="addToCart"
    wire:loading.attr="disabled"
    class="group relative inline-flex items-center w-64 justify-center px-8 py-4 
           bg-gradient-to-r from-indigo-600 to-purple-600 
           hover:from-indigo-500 hover:to-purple-500 
           rounded-xl font-bold text-white text-lg 
           shadow-xl hover:shadow-2xl transform hover:-translate-y-1 
           transition-all duration-300 overflow-hidden cursor-pointer">
    
    <span wire:loading.remove class="flex items-center gap-3">
        <x-bi-cart class="w-6 h-6" />
        Add to Cart
    </span>
    
    <div wire:loading class="items-center">
        <span class="text-white font-medium flex gap-3 items-center justify-center">
            <svg class="animate-spin w-5 h-5 text-white" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg> Adding...</span>
    </div>
</button>