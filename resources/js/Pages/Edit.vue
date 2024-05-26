<template>
    <div class="p-8">
      <h1 class="text-4xl font-bold text-pink-600 mb-8 text-center">Edit book</h1>
      <div class="border p-4 rounded form-container">
        <form @submit.prevent="submitForm">
          <table class="table">
            <tr>
              <th class="text-left">Name:</th>
              <td class="px-4">
                <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-pink-500" v-model="form.name" type="text">
              </td>
            </tr>
            <tr>
              <th class="text-left">Image URL:</th>
              <td class="px-4">
                <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-pink-500" v-model="form.imageUrl" type="text">
              </td>
            </tr>
            <tr>
              <th class="text-left">Description:</th>
              <td class="px-4">
                <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-pink-500" v-model="form.description" type="text">
              </td>
            </tr>
          </table>
          <div class="text-right">
            <button type="button" @click="goBack" class="btn btn-back text-white font-bold">Back</button>
            <button type="submit" class="btn btn-save ml-2 text-white font-bold">Save</button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import Mylayout from '@/Layouts/MyLayout.vue';
  
  const props = defineProps({
    book: Object
  });
  
  const form = useForm({
    name: props.book.name,
    imageUrl: props.book.imageUrl,
    description: props.book.description,

  });
  
  const submitForm = async () => {
    await form.put(`/book/${props.book.id}`);
  };
  
  const goBack = () => {
    window.history.back();
  };
  
  defineOptions({
      layout: Mylayout,
  });
  </script>
  
  <style scoped>
  /* EditBook.css */
  
  /* Center the form horizontally */
  .form-container {
    max-width: 600px; /* Set the max width for better readability */
    margin: 0 auto; /* Center the form horizontally */
  }
  
  /* Style for the table layout */
  .table {
    width: 100%; /* Ensure table takes full width of its container */
  }
  
  /* Style for table header */
  .table th {
    text-align: left; /* Align text to the left */
    padding-right: 1rem; /* Add some padding to the right */
  }
  
  /* Style for table data cells */
  .table td {
    padding-left: 1rem; /* Add some padding to the left */
  }
  
  /* Style for the buttons */
  .btn {
    padding: 0.5rem 1rem; /* Add padding to the buttons */
    border-radius: 0.25rem; /* Add a slight border radius */
    cursor: pointer; /* Change cursor to pointer on hover */
  }
  
  /* Style for the "Back" button */
  .btn-back {
    background-color: #ff69b4; /* Set background color */
  }
  
  /* Style for the "Save" button */
  .btn-save {
    background-color: #ff007f; /* Set background color */
    margin-left: 0.5rem; /* Add some space between buttons */
  }
  </style>
  