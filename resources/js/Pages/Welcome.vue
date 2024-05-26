<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const showDropdown = ref(false);

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function toggleDropdown() {
    showDropdown.value = !showDropdown.value;
}

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-white text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute inset-0 w-full h-full object-cover z-0"
            src="../Components/estitik.jpg"
            @error="handleImageError"
        />
        <div class="flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-start lg:col-start-1">
                        <img src="../Components/nestle.png" alt="me" class="w-[20vh]" />
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end lg:col-start-3 relative">
                        <button @click="toggleDropdown" class="rounded-md px-3 py-2 btn-pink btn text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Sign In
                        </button>
                        <div v-show="showDropdown" class="absolute right-0 mt-2 w-48 bg-white dark:bg-red border border-gray-200 dark:border-gray-700 rounded-md shadow-lg py-1">
                            <Link
                                v-if="$page.props.auth.user"
                                :href="route('dashboard')"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800"
                            >
                                Dashboard
                            </Link>
                            <template v-else>
                                <Link
                                    :href="route('login')"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800"
                                >
                                    Log in
                                </Link>
                                <Link
                                    v-if="canRegister"
                                    :href="route('register')"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800"
                                >
                                    Register
                                </Link>
                            </template>
                        </div>
                    </nav>
                </header>

                <main class="mt-20">
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-10">
                    <h1 class="text-5xl font-bold text-gray-800 dark:text-gray-100 mb-4">Welcome to Nestle Corp.</h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">Nestle Corp. is a global food and beverage company.</p>
                    <Link 
                        href="/login" 
                        class="inline-block rounded-md btn-red px-10 py-3 text-lg font-semibold text-white bg-black ring-1 ring-transparent transition hover:bg-[#ffbfdf] dark:hover:bg-[#4a4a4a] focus:outline-none focus-visible:ring-white"
                    >
                        Explore!
                    </Link>
                </div>
            </main>

                <footer class="py-4 text-gray-500 text-center mt-[10%]">
                    Copyright &copy; 2024. Nestle Ann Lismoras, Student.
                </footer>
            </div>
        </div>
    </div>
</template>

<style scoped>
.bg-white {
    background-color: #ffffff;
}
.text-black\/50 {
    color: rgba(0, 0, 0, 0.5);
}
.dark\:bg-black {
    background-color: #000000;
}
.dark\:text-white\/50 {
    color: rgba(255, 255, 255, 0.5);
}
.absolute {
    position: absolute;
}
.inset-0 {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.w-full {
    width: 100%;
}
.h-full {
    height: 100%;
}
.object-cover {
    object-fit: cover;
}
.z-0 {
    z-index: 0;
}
.flex {
    display: flex;
}
.flex-col {
    flex-direction: column;
}
.items-center {
    align-items: center;
}
.justify-center {
    justify-content: center;
}
.selection\:bg-\[\#FF2D20\]::selection {
    background-color: #FF2D20;
}
.selection\:text-white::selection {
    color: white;
}
.relative {
    position: relative;
}
.w-full {
    width: 100%;
}
.max-w-2xl {
    max-width: 42rem;
}
.px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}
.lg\:max-w-7xl {
    max-width: 80rem;
}
.grid {
    display: grid;
}
.grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
}
.items-center {
    align-items: center;
}
.gap-2 {
    gap: 0.5rem;
}
.py-10 {
    padding-top: 2.5rem;
    padding-bottom: 2.5rem;
}
.lg\:grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}
.flex {
    display: flex;
}
.lg\:justify-start {
    justify-content: flex-start;
}
.lg\:col-start-1 {
    grid-column-start: 1;
}
.text-center {
    text-align: center;
}
.text-4xl {
    font-size: 2.25rem;
}
.font-bold {
    font-weight: 700;
}
.pink {
    color: #FF2D20;
}
.mt-4 {
    margin-top: 1rem;
}
.text-lg {
    font-size: 1.125rem;
}
.mt-6 {
    margin-top: 1.5rem;
}
.inline-block {
    display: inline-block;
}
.rounded-md {
    border-radius: 0.375rem;
}
.btn-pink {
    background-color: #FF2D20;
}
.px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}
.py-3 {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
}
.text-white {
    color: #ffffff;
}
.bg-black {
    background-color: #000000;
}
.ring-1 {
    border-width: 1px;
}
.ring-transparent {
    border-color: transparent;
}
.transition {
    transition: all 0.2s;
}
.hover\:bg-\[\#ffbfdf\]:hover {
    background-color: #ffbfdf;
}
.focus\:outline-none:focus {
    outline: none;
}
.focus-visible\:ring-white:focus-visible {
    box-shadow: 0 0 0 2px white;
}
.py-4 {
    padding-top: 1rem;
    padding-bottom: 1rem;
}
.text-gray-500 {
    color: #6B7280;
}
.mt-\[20\%\] {
    margin-top: 20%;
}
</style>
