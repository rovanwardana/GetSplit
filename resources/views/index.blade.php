<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/image/logo.png') }}">
    <title>GetSplit - Split Bills with Friends</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-blue': '#071739',
                        'brand-blue-light': '#0a2147',
                        'brand-blue-dark': '#050f24',
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="m-0 p-0 font-sans text-gray-800"
    style="background: linear-gradient(135deg, #071739 0%, #0a2147 50%, #071739 100%);">

    <!-- Header -->
    <header class="bg-white bg-opacity-95 backdrop-blur-md py-4 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-5 flex justify-between items-center">
            <img src="/assets/image/logo1.png" alt="GetSplit" class="h-12 w-auto">
            <nav class="flex items-center gap-8">
                <a href="#features"
                    class="text-gray-700 font-medium hover:text-green-500 transition-colors duration-300">Features</a>
                <a href="#how-it-works"
                    class="text-gray-700 font-medium hover:text-green-500 transition-colors duration-300">How It
                    Works</a>
                <a href="#faq"
                    class="text-gray-700 font-medium hover:text-green-500 transition-colors duration-300">FAQ</a>
                <a href="{{ route('login') }}"
                    class="text-white px-7 py-3 rounded-full font-semibold hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300"
                    style="background: linear-gradient(135deg, #071739 0%, #0a2147 100%);">Get Started</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="py-20 text-center text-white relative overflow-hidden">
            <div class="absolute inset-0 pointer-events-none"
                style="background: radial-gradient(circle at 30% 50%, rgba(34, 197, 94, 0.15) 0%, transparent 50%);">
            </div>
            <div class="max-w-7xl mx-auto px-5 relative z-10">
                <h1 class="text-6xl font-extrabold mb-6 leading-tight">
                    Split Bills with Friends, <span class="text-green-400 block mt-2">Hassle-Free</span>
                </h1>
                <p class="text-xl mb-10 text-blue-100 max-w-2xl mx-auto leading-relaxed">
                    GetSplit makes it easy to track expenses, split bills, and settle up with friends. No more awkward
                    money conversations or complicated spreadsheets.
                </p>
                <div class="flex gap-4 justify-center items-center flex-wrap">
                    <a href="{{ route('login') }}"
                        class="bg-green-500 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-600 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">Start
                        Splitting Now</a>
                    <a href="#how-it-works"
                        class="bg-white px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300"
                        style="color: #071739;">Learn How It Works</a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-5">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4" style="color: #071739;">Everything You Need to Split Bills</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">GetSplit makes it simple to manage shared
                        expenses and keep track of payments.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Feature 1 -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-green-50 p-8 rounded-2xl hover:-translate-y-2 transition-all duration-300 hover:shadow-xl border-2 border-transparent hover:border-green-400">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl mb-6 mx-auto"
                            style="background: linear-gradient(135deg, #071739 0%, #22c55e 100%);">💰</div>
                        <h3 class="text-xl font-bold mb-3" style="color: #071739;">Easy Expense Tracking</h3>
                        <p class="text-gray-600 leading-relaxed">Add expenses instantly and categorize them. Keep track
                            of who paid what and when with detailed transaction history.</p>
                    </div>
                    <!-- Feature 2 -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-green-50 p-8 rounded-2xl hover:-translate-y-2 transition-all duration-300 hover:shadow-xl border-2 border-transparent hover:border-green-400">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl mb-6 mx-auto"
                            style="background: linear-gradient(135deg, #071739 0%, #22c55e 100%);">🔄</div>
                        <h3 class="text-xl font-bold mb-3" style="color: #071739;">Smart Bill Splitting</h3>
                        <p class="text-gray-600 leading-relaxed">Split bills equally or customize amounts. Handle
                            complex scenarios with ease using our flexible splitting options.</p>
                    </div>
                    <!-- Feature 3 -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-green-50 p-8 rounded-2xl hover:-translate-y-2 transition-all duration-300 hover:shadow-xl border-2 border-transparent hover:border-green-400">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl mb-6 mx-auto"
                            style="background: linear-gradient(135deg, #071739 0%, #22c55e 100%);">📊</div>
                        <h3 class="text-xl font-bold mb-3" style="color: #071739;">Clear Summaries</h3>
                        <p class="text-gray-600 leading-relaxed">See payment status at a glance. Get detailed breakdowns
                            of all expenses and who still needs to pay.</p>
                    </div>
                    <!-- Feature 4 -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-green-50 p-8 rounded-2xl hover:-translate-y-2 transition-all duration-300 hover:shadow-xl border-2 border-transparent hover:border-green-400">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-3xl mb-6 mx-auto"
                            style="background: linear-gradient(135deg, #071739 0%, #22c55e 100%);">🔒</div>
                        <h3 class="text-xl font-bold mb-3" style="color: #071739;">Secure & Private</h3>
                        <p class="text-gray-600 leading-relaxed">Your financial data is protected with industry-standard
                            security. Share only what you want with who you want.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section id="how-it-works" class="py-20 bg-gradient-to-br from-blue-50 to-green-50">
            <div class="max-w-7xl mx-auto px-5">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4" style="color: #071739;">How GetSplit Works</h2>
                    <p class="text-lg text-gray-600">Split bills in three simple steps</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div
                        class="bg-white p-10 rounded-2xl text-center border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 mx-auto"
                            style="background: linear-gradient(135deg, #071739 0%, #22c55e 100%);">1</div>
                        <h3 class="text-xl font-bold mb-3" style="color: #071739;">Create a Bill</h3>
                        <p class="text-gray-600 leading-relaxed">Enter the bill amount, add items, and choose who's
                            involved. Add tax and discounts for accurate splitting.</p>
                    </div>
                    <!-- Step 2 -->
                    <div
                        class="bg-white p-10 rounded-2xl text-center border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 mx-auto"
                            style="background: linear-gradient(135deg, #071739 0%, #22c55e 100%);">2</div>
                        <h3 class="text-xl font-bold mb-3" style="color: #071739;">Split with Participants</h3>
                        <p class="text-gray-600 leading-relaxed">Choose how to divide the bill - split equally or assign
                            specific items to each person for precise calculations.</p>
                    </div>
                    <!-- Step 3 -->
                    <div
                        class="bg-white p-10 rounded-2xl text-center border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center text-white text-2xl font-bold mb-6 mx-auto"
                            style="background: linear-gradient(135deg, #071739 0%, #22c55e 100%);">3</div>
                        <h3 class="text-xl font-bold mb-3" style="color: #071739;">Track Payments</h3>
                        <p class="text-gray-600 leading-relaxed">Mark participants as paid when they settle up. Keep
                            balances updated and see who's paid at a glance.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-5">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4" style="color: #071739;">Loved by Friends Everywhere</h2>
                    <p class="text-lg text-gray-600">See what our users have to say about GetSplit</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-green-50 p-8 rounded-2xl border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://i.pinimg.com/736x/bb/a3/83/bba3836c7ba325fcf65c0351f1ae9540.jpg"
                                alt="Sarah T."
                                class="w-16 h-16 rounded-full object-cover mr-4 border-4 border-green-400">
                            <div>
                                <h4 class="font-bold" style="color: #071739;">Sarah T.</h4>
                                <p class="text-sm text-gray-600">Group Trip Organizer</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">"GetSplit saved our friendship during our trip
                            to Europe! No more awkward who owes what conversations."</p>
                    </div>
                    <!-- Testimonial 2 -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-green-50 p-8 rounded-2xl border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://img-highend.okezone.com/okz/900/pictureArticle/images_z79U7V6y_xiJ904.jpg"
                                alt="Mike R."
                                class="w-16 h-16 rounded-full object-cover mr-4 border-4 border-green-400">
                            <div>
                                <h4 class="font-bold" style="color: #071739;">Mike R.</h4>
                                <p class="text-sm text-gray-600">Roommate</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">"We use GetSplit for all our apartment
                            expenses. It's so easy to track who paid for what and keep everything fair."</p>
                    </div>
                    <!-- Testimonial 3 -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-green-50 p-8 rounded-2xl border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <img src="https://assets.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/63/2023/07/18/278904010_332434105540706_5703095942165431083_n-1813902612.jpg"
                                alt="Jamie L."
                                class="w-16 h-16 rounded-full object-cover mr-4 border-4 border-green-400">
                            <div>
                                <h4 class="font-bold" style="color: #071739;">Jamie L.</h4>
                                <p class="text-sm text-gray-600">Friend Group Treasurer</p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed italic">"My friend group uses GetSplit for everything
                            from dinners to concert tickets. It keeps everything transparent and fair."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq" class="py-20 bg-gradient-to-br from-blue-50 to-green-50">
            <div class="max-w-4xl mx-auto px-5">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4" style="color: #071739;">Frequently Asked Questions</h2>
                    <p class="text-lg text-gray-600">Everything you need to know about GetSplit</p>
                </div>
                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <div
                        class="bg-white rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <button onclick="toggleFAQ(this)"
                            class="w-full p-6 text-left font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors duration-300"
                            style="color: #071739;">
                            Is GetSplit free to use?
                            <span class="text-2xl text-green-500">+</span>
                        </button>
                        <div class="hidden px-6 pb-6 text-gray-600 leading-relaxed">
                            Yes! GetSplit is completely free to use for basic bill splitting and expense tracking.
                            Create unlimited bills and manage your expenses without any cost.
                        </div>
                    </div>
                    <!-- FAQ 2 -->
                    <div
                        class="bg-white rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <button onclick="toggleFAQ(this)"
                            class="w-full p-6 text-left font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors duration-300"
                            style="color: #071739;">
                            Do participants need an account?
                            <span class="text-2xl text-green-500">+</span>
                        </button>
                        <div class="hidden px-6 pb-6 text-gray-600 leading-relaxed">
                            No, participants don't need an account. You can add anyone by name and track their payment
                            status without requiring them to sign up.
                        </div>
                    </div>
                    <!-- FAQ 3 -->
                    <div
                        class="bg-white rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <button onclick="toggleFAQ(this)"
                            class="w-full p-6 text-left font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors duration-300"
                            style="color: #071739;">
                            Can I use GetSplit on my phone?
                            <span class="text-2xl text-green-500">+</span>
                        </button>
                        <div class="hidden px-6 pb-6 text-gray-600 leading-relaxed">
                            Absolutely! GetSplit is fully responsive and works great on mobile devices. You can manage
                            your expenses and split bills on the go from any device.
                        </div>
                    </div>
                    <!-- FAQ 4 -->
                    <div
                        class="bg-white rounded-2xl overflow-hidden border-2 border-gray-200 hover:border-green-400 transition-all duration-300">
                        <button onclick="toggleFAQ(this)"
                            class="w-full p-6 text-left font-semibold text-lg flex justify-between items-center hover:bg-gray-50 transition-colors duration-300"
                            style="color: #071739;">
                            How does bill splitting work?
                            <span class="text-2xl text-green-500">+</span>
                        </button>
                        <div class="hidden px-6 pb-6 text-gray-600 leading-relaxed">
                            You can split bills equally among participants or assign specific items to each person.
                            GetSplit automatically calculates tax and discount proportionally for accurate splitting.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10">
        <div class="max-w-7xl mx-auto px-5 text-center">
            <p class="text-gray-400">© 2025 GetSplit. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleFAQ(button) {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('span');
            const isHidden = answer.classList.contains('hidden');

            // Close all FAQs
            document.querySelectorAll('.bg-white.rounded-2xl > div:last-child').forEach(item => {
                item.classList.add('hidden');
            });
            document.querySelectorAll('.bg-white.rounded-2xl button span').forEach(item => {
                item.textContent = '+';
            });

            // Toggle current FAQ
            if (isHidden) {
                answer.classList.remove('hidden');
                icon.textContent = '−';
            }
        }
    </script>
</body>

</html>
