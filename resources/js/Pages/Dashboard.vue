<script setup>
import Mylayout from '@/Layouts/MyLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: Mylayout
});
</script>

<template>
    <div class="welcome-container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg animated fadeInUp">
                <div class="p-12 flex justify-center">
                    <img src="../Components/welcome.gif" alt="Welcome Image" class="welcome-img">
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.welcome-container {
    background: linear-gradient(to right, #f8fafc, #e2e8f0);
    min-height: calc(100vh - 4rem);
    display: flex;
    align-items: center;
    justify-content: center;
}

.animated {
    animation-duration: 1s;
    animation-fill-mode: both;
}

.fadeInUp {
    animation-name: fadeInUp;
}

.welcome-img {
    width: 100%;
    max-width: 600px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 10s ease-in-out;
}

.welcome-img:hover {
    transform: scale(1.05);
}
</style>
