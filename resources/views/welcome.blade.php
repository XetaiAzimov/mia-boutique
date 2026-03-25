<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mia Boutique | Premium Jewelry</title>
    
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3E%3Ccircle cx='8' cy='8' r='8' fill='%23ffafbd'/%3E%3Ctext x='8' y='11.5' font-family='Arial, sans-serif' font-weight='black' font-size='10' text-anchor='middle' fill='%23FFFAF0'%3Em%3C/text%3E%3C/svg%3E">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&family=Playfair+Display:italic,wght@700&display=swap');
        :root { --mia-pink: #ffafbd; }
        body { font-family: 'Quicksand', sans-serif; background-color: #fffafb; scroll-behavior: smooth; }
        .brand-font { font-family: 'Playfair Display', serif; }
        .cart-sidebar { transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .product-card { transition: all 0.3s ease; }
        .product-card:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(255, 175, 189, 0.2); }
        #note-wrapper { transition: max-height 0.3s ease-out; overflow: hidden; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #ffafbd; border-radius: 10px; }
        #searchInput:focus {
    width: 160px; /* Açılan vaxt ölçüsü */
    opacity: 1;
    margin-right: 10px;
}
    </style>
</head>
<body class="text-gray-800">

    <nav class="sticky top-0 bg-white/90 backdrop-blur-md z-50 px-6 py-4 flex justify-between items-center shadow-sm border-b border-pink-100">
        <div class="text-3xl brand-font text-pink-500 italic lowercase tracking-tighter cursor-pointer" onclick="filterItems('all')">mia.</div>
        
        <div class="hidden md:flex space-x-8 text-xs font-bold uppercase tracking-widest text-gray-500">
            <button onclick="filterItems('all')" class="hover:text-pink-400">Hamısı</button>
            <button onclick="filterItems('sep')" class="hover:text-pink-400">Seplər</button>
            <button onclick="filterItems('qolbaq')" class="hover:text-pink-400">Qolbaqlar</button>
            <button onclick="filterItems('uzuk')" class="hover:text-pink-400">Üzüklər</button>

            <div class="relative flex items-center">
    <input type="text" id="searchInput" onkeyup="searchProducts()" 
           placeholder="Axtar..." 
           class="w-0 opacity-0 focus:w-40 focus:opacity-100 focus:pl-8 focus:pr-3 py-1.5 bg-pink-50/50 border border-pink-100 rounded-full text-[10px] transition-all duration-500 outline-none placeholder:text-gray-400">
    
    <button onclick="document.getElementById('searchInput').focus()" class="absolute left-2 text-gray-400 hover:text-pink-500 transition-colors">
        <i data-lucide="search" class="w-3.5 h-3.5"></i>
    </button>
</div>
        </div>



        <div class="flex items-center space-x-5">
            <a href="https://wa.me/994707414401" target="_blank" class="text-[#25D366] hover:scale-110 transition-transform flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="#25D366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.63 1.438h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </a>
            <a href="https://www.instagram.com/azimoff_211/" target="_blank" class="text-gray-400 hover:text-pink-500 transition-all flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram">
        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
    </svg>
</a>
            <button onclick="toggleCart()" class="relative p-2.5 bg-pink-50 rounded-full text-pink-500 shadow-inner">
                <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                <span id="cart-count" class="absolute -top-1 -right-1 bg-pink-500 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full font-bold">0</span>
            </button>
        </div>
    </nav>

    <header class="relative py-16 text-center overflow-hidden">
        <h2 class="text-5xl md:text-6xl brand-font mb-4">Zəriflik detallarda gizlidir</h2>
        <p class="text-gray-400 tracking-[0.3em] text-[10px] uppercase font-medium italic">özünü əzizləmək üçün bəhanə axtarma, sən buna layiqsən.</p>
    </header>

    <main class="max-w-7xl mx-auto px-6 pb-32">
    <div id="product-container" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
    <div class="product-card group bg-white rounded-[1.5rem] overflow-hidden border border-pink-50/50 shadow-sm transition-all hover:shadow-md {{ !$product->in_stock ? 'opacity-75' : '' }}" data-type="{{ $product->type }}">
        
        <div class="relative overflow-hidden aspect-[4/5]">
            <img src="{{ asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700 {{ !$product->in_stock ? 'grayscale' : '' }}">
            
            @if(!$product->in_stock)
                <div class="absolute inset-0 flex items-center justify-center bg-black/5 backdrop-blur-[1px]">
                    <span class="bg-white/90 text-gray-500 px-3 py-1.5 rounded-full text-[9px] font-bold uppercase tracking-widest shadow-sm border border-gray-100">
                        Tezliklə Stokda 🌸
                    </span>
                </div>
            @else
                <button onclick="addToCart(this)" 
                        data-product='@json($product)'
                        class="absolute bottom-3 right-3 bg-white text-pink-500 p-3 rounded-xl shadow-xl opacity-0 group-hover:opacity-100 transition-all transform translate-y-2 group-hover:translate-y-0 hover:bg-pink-500 hover:text-white">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                </button>
            @endif
        </div>

        <div class="p-4">
            <h4 class="text-[8px] font-bold text-gray-400 uppercase mb-1">{{ $product->type }}</h4>
            <p class="font-bold text-gray-800 text-xs h-8 overflow-hidden">{{ $product->name }}</p>
            <div class="flex items-center justify-between mt-2">
                <span class="text-sm font-black text-pink-500">
                    {{ $product->price > 0 ? number_format($product->price, 2) . ' AZN' : 'Hədiyyə 🎁' }}
                </span>
                
                @if(!$product->in_stock)
                    <span class="text-[8px] text-gray-300 font-bold uppercase italic">Tükənib</span>
                @endif
            </div>
        </div>
    </div>
@endforeach
    </div>
</main>

    <footer class="py-10 border-t border-pink-50 text-center">
        <p class="text-[10px] text-gray-400 uppercase tracking-widest">
            © 2026 Mia Boutique. Bütün hüquqlar qorunur. <br>
            Dizayn və Tərtibat: 
            <span onclick="openAdminLogin()" class="cursor-pointer hover:text-pink-500 font-bold transition-all">Xətai Əzimov</span>
        </p>
    </footer>

    <div id="cart-sidebar" class="fixed top-0 right-0 h-full w-full md:w-[400px] bg-white shadow-2xl z-[100] translate-x-full cart-sidebar flex flex-col">
        <div class="p-6 border-b flex justify-between items-center bg-pink-50/30">
            <h3 class="brand-font text-2xl text-gray-800">Səbətin</h3>
            <button onclick="toggleCart()" class="text-gray-400 hover:text-pink-500"><i data-lucide="x" class="w-6 h-6"></i></button>
        </div>
        
        <div id="cart-items" class="flex-1 overflow-y-auto p-6 space-y-4"></div>

        <div class="px-6 py-4 bg-white border-t border-pink-50 space-y-2">
            <label class="flex items-center space-x-2 cursor-pointer mb-2">
                <input type="checkbox" id="gift-wrap" class="accent-pink-500 w-3 h-3" onchange="updateCart()">
                <span class="text-[9px] font-bold text-gray-500 uppercase tracking-tighter">Hədiyyə paketi (+2 AZN) 🎁</span>
            </label>
            
            <div class="border border-pink-50 rounded-xl overflow-hidden">
                <button onclick="toggleNote()" class="w-full flex justify-between items-center p-3 bg-pink-50/20 text-[9px] font-bold text-pink-400 uppercase tracking-tighter">
                    <span>Özəl sözləriniz varsa əlavə edin +</span>
                    <i data-lucide="chevron-down" id="note-icon" class="w-3 h-3 transition-transform"></i>
                </button>
                <div id="note-wrapper" class="max-h-0">
                    <textarea id="order-note" class="w-full p-3 text-xs border-t border-pink-50 focus:outline-none bg-white" placeholder="Bura qeydinizi yazın..." rows="2"></textarea>
                </div>
            </div>
        </div>

        <div class="p-6 border-t bg-white space-y-3">
            <div class="flex justify-between items-end">
                <span class="text-gray-400 uppercase text-[10px] font-bold tracking-widest">Ümumi</span>
                <span id="cart-total" class="text-xl font-bold text-pink-500">0.00 AZN</span>
            </div>
            <button onclick="checkout()" class="w-full bg-[#25D366] text-white py-4 rounded-xl font-bold uppercase text-[10px] hover:bg-[#128C7E] transition-all flex items-center justify-center space-x-2 shadow-lg shadow-green-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
                <span>WhatsApp ilə Tamamla</span>
            </button>
        </div>
    </div>

    <div id="admin-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[200] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-8 w-full max-w-sm shadow-2xl text-center border border-pink-50">
        <h3 class="brand-font text-2xl mb-6 text-gray-800 italic">Mia Admin</h3>
        
        <input type="password" id="admin-password" class="w-full p-4 bg-pink-50/50 rounded-xl border border-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-200 mb-4 text-center" placeholder="Giriş kodu">
        
        <div class="flex space-x-3">
            <button onclick="closeAdminModal()" class="flex-1 py-3 text-gray-400 font-bold uppercase text-[10px]">Ləğv et</button>
            <button onclick="checkAdminPass()" class="flex-1 bg-pink-500 text-white py-3 rounded-xl font-bold uppercase text-[10px] shadow-lg shadow-pink-100">Giriş</button>
        </div>
    </div>
</div>

    <script>
       lucide.createIcons();

let cart = [];

function toggleCart() {
    document.getElementById('cart-sidebar').classList.toggle('translate-x-full');
}

function addToCart(element) {
    try {
        const product = JSON.parse(element.getAttribute('data-product'));
        cart.push(product);
        updateCart();
        if (window.innerWidth > 768) {
            const sidebar = document.getElementById('cart-sidebar');
            if (sidebar.classList.contains('translate-x-full')) toggleCart();
        }
    } catch (e) { console.error("Xəta:", e); }
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCart();
}

function updateCart() {
    const itemsContainer = document.getElementById('cart-items');
    document.getElementById('cart-count').innerText = cart.length;

    if (cart.length === 0) {
        itemsContainer.innerHTML = `<div class="text-center opacity-20 py-10 italic text-[10px]">Səbətiniz boşdur 🌸</div>`;
        document.getElementById('cart-total').innerText = "0.00 AZN";
    } else {
        itemsContainer.innerHTML = cart.map((item, index) => `
            <div class="flex items-center space-x-3 bg-pink-50/20 p-2 rounded-xl border border-pink-50">
                <img src="/storage/${item.image}" class="w-10 h-10 rounded-lg object-cover">
                <div class="flex-1 leading-tight">
                    <h5 class="text-[9px] font-bold uppercase text-gray-700">${item.name}</h5>
                    <p class="text-pink-500 font-bold text-[9px]">${item.price} AZN</p>
                </div>
                <button onclick="removeFromCart(${index})" class="text-gray-300 hover:text-red-400">
                    <i data-lucide="trash-2" class="w-3 h-3"></i>
                </button>
            </div>
        `).join('');

        let total = cart.reduce((sum, item) => sum + parseFloat(item.price), 0);
        if (document.getElementById('gift-wrap').checked) total += 2;
        document.getElementById('cart-total').innerText = total.toFixed(2) + " AZN";
    }
    lucide.createIcons();
}

function filterItems(category) {
    document.querySelectorAll('.product-card').forEach(card => {
        card.style.display = (category === 'all' || card.getAttribute('data-type') === category) ? 'block' : 'none';
    });
}

function checkout() {
    if (cart.length === 0) return alert("Səbətiniz boşdur! 🌸");
    
    // 1. Məhsulların siyahısını hazırlayırıq
    let message = `Salam Mia Boutique! 🌸\nSifariş vermək istəyirəm:\n\n`;
    cart.forEach((p, i) => {
        message += `${i + 1}. ${p.name} - ${p.price} AZN\n`;
    });

    // 2. Hədiyyə paketi yoxlanışı
    const isGiftWrapped = document.getElementById('gift-wrap').checked;
    if (isGiftWrapped) {
        message += `\n🎁 Hədiyyə paketi istəyirəm (+2 AZN)`;
    }

    // 3. Müştərinin yazdığı özəl qeydi götürürük
    const orderNote = document.getElementById('order-note').value.trim();
    if (orderNote !== "") {
        message += `\n\n📝 Özəl Qeyd:\n"${orderNote}"`;
    }

    // 4. Ümumi məbləği götürürük
    const totalAmount = document.getElementById('cart-total').innerText;
    message += `\n\n💰 Cəmi ödəniləcək məbləğ: ${totalAmount}`;

    // 5. WhatsApp linkini açırıq
    const whatsappUrl = `https://wa.me/994707414401?text=${encodeURIComponent(message)}`;
    window.open(whatsappUrl, '_blank');
}

function toggleNote() {
    const w = document.getElementById('note-wrapper');
    const icon = document.getElementById('note-icon');
    
    if (w.style.maxHeight === '0px' || !w.style.maxHeight) {
        w.style.maxHeight = '100px';
        icon.style.transform = 'rotate(180deg)'; // Oxu döndər
    } else {
        w.style.maxHeight = '0px';
        icon.style.transform = 'rotate(0deg)';   // Oxu qaytar
    }
}

// ADMIN MODAL FUNKSİYALARI
function openAdminLogin() {
    document.getElementById('admin-modal').classList.remove('hidden');
    document.getElementById('admin-password').focus();
}

function closeAdminModal() {
    document.getElementById('admin-modal').classList.add('hidden');
    document.getElementById('admin-password').value = "";
}

function searchProducts() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const products = document.querySelectorAll('.product-card');

    products.forEach(product => {
        // Məhsulun adını və tipini yoxlayırıq
        const productName = product.querySelector('p').innerText.toLowerCase();
        const productType = product.getAttribute('data-type').toLowerCase();

        if (productName.includes(input) || productType.includes(input)) {
            product.style.display = 'block';
            product.classList.add('animate-in', 'fade-in');
        } else {
            product.style.display = 'none';
        }
    });
}

function checkAdminPass() {
    const passInput = document.getElementById('admin-password');
    const secretKey = "mia2026"; 

    if (passInput.value === secretKey) {
        window.location.href = "/admin";
    } else {
        alert("Xətalı parol! ❌");
        passInput.value = "";
        passInput.focus();
    }
}

// Enter düyməsi ilə giriş
document.addEventListener('keypress', function (e) {
    if (e.which === 13 && !document.getElementById('admin-modal').classList.contains('hidden')) {
        checkAdminPass();
    }
});
    </script>
</body>
</html>