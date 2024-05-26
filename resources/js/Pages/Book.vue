<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Link, usePage } from "@inertiajs/vue3";
import { ref } from 'vue';

defineOptions({
  layout: MyLayout
});

const props = defineProps({
    book: Array
});

const form = useForm({
  name: props.book.name,
  imageUrl: props.book.category_id,
});

const delEmp = (book) => {
  const del = confirm("Are you sure you want to delete?");
  if (del) {
    form.delete(`/book/${book.id}`, {
      preserveScroll: true
    }).then(() => {
      // Handle success or other actions after deletion
    });
  }
};
</script>

<template>
  <div class="mt-[-8%]">
    <div class="flex justify-between items-center mt-[10%] ml-[2%]">
      <div class="flex items-center space-x-4">
        <Link href='/portfolio' class="btn arrow">←</Link>
      </div>
      <div class="mr-[1%]">
        <Link href='/book/create' class="btn-red text-white rounded fw-bold p-2">
          Add Book
        </Link>
      </div>
    </div>

    <div class="overflow-auto h-[80vh] p-2 container mt-5 ">
      <div v-for="book in book" :key="book.id" class="mt-2 border p-2 bg-white rounded">    
        <div class="flex gap-2">
          <div class="w-[40%] mx-auto">
            <img :src="book.imageUrl" alt="Portfolio Image" class="w-full h-auto rounded-lg object-cover max-h-[60vh]">
          </div>

          <div class="w-full flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between">
                <h1 class="text-4xl flex-1 nn tit">{{ book.name }}</h1>
                <div class="flex space-x-2">
                  <button @click="delEmp(book)" class="btn-red hover:bg-red-500 text-white py-2 px-3 rounded transition ease-linear duration-200">X</button>
                  <Link :href="'/book/' + book.id + '/edit'" class="btn-red text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square rounded" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                  </Link>
                </div>
              </div>
              <p class="text-4xl flex-1 nn tit">{{ book.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.tit {
  font-weight: bold;
  font-size: 2.25rem;
  color: #ff69b4;
  transition: transform 0.2s ease-in-out;
}

.tit:hover {
  transform: scale(1.05);
}

.nn {
  text-align: start;
  margin-top: 10px;
  color: #666;
  font-size: 1.1rem;
  margin-left: 10px;
  margin-bottom: 15px;
}

.row {
  padding: 20px;
  border-bottom: 1px solid #eee;
}

.tt {
  font-size: 30px;
  color: #ae1515;
}

.text-4xl {
  font-size: 2.25rem;
  color: #151313;
}

.arrow {
  font-size: 2.25rem;
  color: #ff69b4;
  text-shadow: 2px 2px 0 #ff69b4;
  transition: color 0.2s, text-shadow 0.2s;
}

.arrow:hover {
  color: #ffb6c1;
  text-shadow: 2px 2px 0 #ffb6c1;
}

.btn-red {
  background-color: #ff0000;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  box-shadow: 2px 2px 0 #ff0000, 4px 4px 0 #ff0000;
  transition: background-color 0.2s, box-shadow 0.2s;
}

.btn-red:hover {
  background-color: #cc0000;
  box-shadow: 2px 2px 0 #cc0000, 4px 4px 0 #cc0000;
}

.container {
  /* background: linear-gradient(135deg, #ffe4e1 0%, #ff69b4 100%); */
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

img {
  border: 3px solid #ff69b4;
  transition: transform 0.2s ease-in-out;
}

img:hover {
  transform: scale(1.05);
}

button {
  font-weight: bold;
  transition: background-color 0.2s, transform 0.2s;
}

button:hover {
  transform: scale(1.1);
}

h1 {
  transition: color 0.2s, text-shadow 0.2s;
}

h1:hover {
  color: #dd1b1b;
  /* text-shadow: 2px 2px 0 #ff69b4, 3px 3px 0 #ff69b4; */
}

p {
  line-height: 1.6;
  font-size: 1.1rem;
  color: #555;
}
</style>
