<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import 'tailwindcss/tailwind.css';

defineOptions({
    layout: MyLayout
});

// Initialize the form with useForm
const form = useForm({
    name: '',
    imageUrl: '',
    description: '', // Ensure all required fields are included
});

// Define the submit function
const submit = () => {
    form.post('/book', {
        onSuccess: () => {
            // Optional: Add any success handling here
            console.log('Book added successfully');
        },
        onError: (errors) => {
            // Optional: Handle any errors here
            console.error('Error adding book:', errors);
        },
    });
};

const props = defineProps({
    book: Object
});
</script>

<template>
    <div class="p-8 bg-gray-100 min-h-screen">
        <h1 class="text-4xl font-bold text-pink-600 mb-8 text-center">Add New Book</h1>

        <div class="border p-6 rounded-lg w-full md:w-2/4 bg-white shadow-lg mx-auto">
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name:</label>
                    <input
                        id="name"
                        class="w-full rounded-md py-2 px-3 border border-gray-300 focus:outline-none focus:border-pink-500 transition duration-200"
                        v-model="form.name"
                        type="text"
                    >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="imageUrl">Image URL:</label>
                    <input
                        id="imageUrl"
                        class="w-full rounded-md py-2 px-3 border border-gray-300 focus:outline-none focus:border-pink-500 transition duration-200"
                        v-model="form.imageUrl"
                        type="text"
                    >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description:</label>
                    <input
                        id="description"
                        class="w-full rounded-md py-2 px-3 border border-gray-300 focus:outline-none focus:border-pink-500 transition duration-200"
                        v-model="form.description"
                        type="text"
                    >
                </div>
                <div class="flex justify-end mt-6">
                    <Link href="/book" class="btn text-white font-bold py-2 px-4 rounded bg-pink-400 hover:bg-pink-500 transition duration-200">Back</Link>
                    <button type="submit" class="btn ml-2 text-white font-bold py-2 px-4 rounded bg-pink-500 hover:bg-pink-600 transition duration-200">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Add your custom styles here */
</style>
