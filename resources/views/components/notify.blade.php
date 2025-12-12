<div>
    <div x-data="{
            show: false,
            message: '',
            type: 'success',
            timeout: null,
            showNotification(msg, type = 'success') {
                this.message = msg;
                this.type = type;
                this.show = true;

                if (this.timeout) clearTimeout(this.timeout);

                this.timeout = setTimeout(() => {
                    this.show = false;
                }, 5000);
            },

            hide() {
                this.show = false;
                if (this.timeout) clearTimeout(this.timeout);
            }
        }"
         x-init=" window.addEventListener('notify', (e) => {
            showNotification(e.detail.message, e.detail.type || 'success');
        });"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-end="opacity-0 transform -translate-y-4"
         class="fixed top-20 right-6 z-50 max-w-sm w-full pointer-events-none">

        <div @click="hide()" class="pointer-events-auto cursor-pointer">
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl shadow-2xl p-4 text-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <template x-if="type === 'success'">
                            <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </template>
                        <template x-if="type === 'error'">
                            <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </template>
                        <span class="font-semibold" x-text="message"></span>
                    </div>
                    <button @click.stop="hide()" class="text-white/60 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
