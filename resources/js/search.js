const search = document.querySelector("#search");
const searchResults = document.querySelector("#search-results");

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
                        searchResults.innerHTML += `
                        <a href="http://localhost:8080/product/${product.slug}"
                        class="flex items-center gap-4 w-full p-3 bg-white/10 hover:bg-white/20 
                                transition rounded-lg border border-white/10">

                            <img src="http://localhost:8080/storage/products/${product.image}"
                                class="h-14 w-14 object-cover rounded-lg shadow shrink-0">

                            <div class="text-white text-lg font-medium">${product.name}</div>
                        </a>
                        `;
                    });

                    data.categories.forEach(category => {
                        searchResults.innerHTML += `
                        <a href="http://localhost:8080/category/${category.slug}"
                           class="flex items-center w-full p-3 bg-white/10 hover:bg-white/20 transition rounded-lg border border-white/10 text-white">
                            
                            <div class="text-white text-lg font-medium">${category.name}</div>
                        </a>
                        `;
                    });

                    data.albums.forEach(album => {
                        searchResults.innerHTML += `
                        <a href="http://localhost:8080/albums/${album.slug}"
                           class="flex items-center gap-4 w-full p-3 bg-white/10 hover:bg-white/20 transition rounded-lg border border-white/10">

                            <img src="http://localhost:8080/storage/albums/${album.image}"
                                 class="h-14 w-14 object-cover rounded-lg shadow">

                            <div class="text-white text-lg font-medium">${album.title}</div>
                        </a>
                        `;
                    });

                } else {
                    searchResults.classList.add("hidden");
                }
            });
    } else {
        searchResults.innerHTML = "";
        searchResults.classList.add("hidden");
    }
});
