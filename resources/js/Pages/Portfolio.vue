<script setup>
import { ref } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import Mylayout from '@/Layouts/MyLayout.vue';
import EditModal from '@/Components/EditModal.vue';

defineOptions({
    layout: Mylayout,
});

const { props } = usePage();
const initialData = ref(props.aboutMeContent || 'Add bio');

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const updateData = (data) => {
    initialData.value = data;
    // Update the backend to persist changes
    Inertia.put(route('about-me.update'), { content: data }, {
        onSuccess: () => {
            console.log('Data updated successfully');
        },
        onError: (errors) => {
            console.error('Error updating data:', errors);
        }
    });
};
</script>

<template>
    <Head title="About Me" />
    <div class="py-12 bg-gray-100 min-h-screen animated fadeInUp">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6">
                <h1 class="text-4xl font-bold text-gray-800">Nestle Ann Lismoras</h1>
                <hr class="my-4" />
                <p class="mt-4 text-center text-gray-600">{{ initialData }}</p>
                <div class="flex justify-center mt-6">
                    <button @click="openModal" class="mx-2 bg-red-500 text-white px-5 py-2 rounded-md hover:bg-red-600">Bio</button>
                    <Link href="/book" class="mx-2 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Books</Link>
                </div>
            </div>
        </div>
    </div>

    <EditModal :show="showModal" :initialData="initialData" @updatedData="updateData" @close="closeModal" />
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

.animated {
    animation-duration: 1s;
    animation-fill-mode: both;
}

.fadeInUp {
    animation-name: fadeInUp;
}

.bg-gray-100 {
    background-color: #f7fafc;
}

.bg-red-500 {
    background-color: #ef4444;
}

.bg-red-600 {
    background-color: #dc2626;
}

.text-red-500 {
    color: #ef4444;
}

.text-red-600 {
    color: #dc2626;
}

.hover\:bg-red-600:hover {
    background-color: #dc2626;
}

.text-gray-600 {
    color: #718096;
}

.text-gray-800 {
    color: #2d3748;
}

.font-bold {
    font-weight: bold;
}

.shadow-lg {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.rounded-md {
    border-radius: 0.375rem;
}

.rounded-lg {
    border-radius: 0.5rem;
}

.p-6 {
    padding: 1.5rem;
}

.my-4 {
    margin-top: 1rem;
    margin-bottom: 1rem;
}

.mt-4 {
    margin-top: 1rem;
}

.mt-6 {
    margin-top: 1.5rem;
}

.mx-2 {
    margin-left: 0.5rem;
    margin-right: 0.5rem;
}
</style>
