<template>
  <div class="max-w-xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">
      ✍️ {{ formTitle }}
    </h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block text-gray-700 font-medium">Title</label>
        <input
          v-model="form.title"
          type="text"
          class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
        />
      </div>

      <div>
        <label class="block text-gray-700 font-medium">Content</label>
        <textarea
          v-model="form.content"
          class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
          rows="6"
        ></textarea>
      </div>
      <div>
  <label class="block text-gray-600 font-medium">Image</label>

  

  <input
    type="file"
    @input="form.image = $event.target.files[0]"
    class="w-full "
  />
</div>


      <button
        type="submit"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
      >
        {{ buttonText }}
      </button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  post: {
    type: Object,
    default: () => ({ title: '', content: '',image:null })
  },
  formTitle: String,
  buttonText: String,
  submitHandler: Function,
});

const form = useForm({
  title: props.post.title,
  content: props.post.content,
  image:null,
});

const submit = () => {
  console.log(form);
  
  props.submitHandler(form);
};
</script>
