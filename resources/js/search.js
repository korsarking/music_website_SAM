const search = document.querySelector("#search");
const searchResults = document.querySelector("#search-results");

function hideSearchResults() {
    searchResults.innerHTML = "";
    searchResults.classList.add("hidden");
}

search.addEventListener("input", () => {
    const val = search.value.trim();

    if (val.length > 2) {
        fetch(`http://localhost:8080/api/search?q=${val}`)
            .then(res => res.json())
            .then(data => {
                searchResults.innerHTML = "";

                if (data.categories.length > 0 || data.products.length > 0 || data.albums.length > 0) {

                    searchResults.classList.remove("hidden");

                    data.products.forEach(product => {
                        if (product.album_id) return;

                        searchResults.innerHTML += `
                            <a href="/product/${product.slug}" 
                                class="flex items-center gap-4 w-full p-3 bg-gradient-to-r from-blue-900/30 to-indigo-900/30 
                                    hover:from-blue-800/50 hover:to-indigo-800/50 rounded-lg transition-all 
                                    border border-blue-500/20">
                                <div class="relative shrink-0">
                                    <img src="/storage/products/${product.image || 'placeholder.jpg'}" 
                                        class="h-14 w-14 object-cover rounded-lg shadow-lg" 
                                        onerror="this.src='/images/placeholder.jpg'">
                                    <div class="absolute inset-0 rounded-lg bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div class="absolute bottom-1 left-1 text-white text-xs font-bold bg-black/60 px-2 py-0.5 rounded">MERCH</div>
                                </div>
                                <div class="flex-1 flex items-center justify-between">
                                    <span class="font-bold text-lg text-white truncate pr-4">${product.name.en}</span>
                                    <span class="text-indigo-300 font-bold text-lg shrink-0">${product.price} $</span>
                                </div>
                            </a>`;
                    });

                    data.categories.forEach(category => {
                        searchResults.innerHTML += `
                            <a href="/category/${category.slug}" 
                                class="flex items-center gap-4 w-full p-4 bg-gradient-to-r from-emerald-900/30 to-teal-900/30 
                                    hover:from-emerald-800/50 hover:to-teal-800/50 rounded-xl transition-all duration-300 
                                    border border-emerald-500/30 shadow-lg hover:shadow-emerald-500/20">
                                <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M3 7h18M3 12h18M3 17h18" />
                                    </svg>
                                </div>
                                <div class="text-white">
                                    <div class="font-bold text-lg flex items-center gap-2">
                                        <span>${category.name.en}</span>
                                        <span class="text-emerald-300 text-xs font-normal uppercase tracking-wider">Category</span>
                                    </div>
                                </div>
                            </a>`;
                    });

                    data.albums.forEach(album => {
                        searchResults.innerHTML += `
                            <a href="/album/${album.slug_album}" 
                                class="flex items-center gap-4 w-full p-3 bg-gradient-to-r from-purple-900/30 to-pink-900/30 
                                    hover:from-purple-800/50 hover:to-pink-800/50 rounded-lg transition-all border border-purple-500/20">
                                <div class="relative shrink-0">
                                    <img src="/storage/albums/${album.path_image || 'placeholder-album.jpg'}" 
                                        class="h-14 w-14 object-cover rounded-lg shadow-lg" 
                                        onerror="this.src='/images/placeholder-album.jpg'">
                                    <div class="absolute inset-0 rounded-lg bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div class="absolute bottom-1 left-1 text-white text-xs font-bold bg-black/60 px-2 py-0.5 rounded">ALBUM</div>
                                </div>
                                <div class="text-white">
                                    <div class="font-bold text-lg truncate">${album.title.en}</div>
                                    <div class="text-gray-300 text-sm">Music ${album.tracks_count || '—'} tracks</div>
                                </div>
                            </a>`;
                    });
                } else {
                    hideSearchResults();
                }
            })
            .catch(() => hideSearchResults());
    } else {
        hideSearchResults();
    }
});

search.addEventListener("focus", function () {
    if (searchResults.children.length > 0) {
        searchResults.classList.remove("hidden");
    }
});

document.addEventListener("click", function (e) {
    if (!search.contains(e.target) && !searchResults.contains(e.target)) {
        search.value= "";
        hideSearchResults();
    }
});

document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        hideSearchResults();
        search.value= "";
    }
});
