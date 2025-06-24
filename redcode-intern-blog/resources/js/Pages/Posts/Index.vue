<template>
  <div class="max-w-3xl mx-auto py-10">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800"> Content Corner</h1>
      <Link href="/posts/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        + Add Post
      </Link>
    </div>

    <div class="space-y-6">
      <div
        v-for="post in posts"
        :key="post.id"
        class="bg-white shadow rounded-lg p-6 border border-gray-200"
      >
        <h2 class="text-xl font-semibold text-gray-800" style="font-size: 50px;height: 60px;">{{ post.title }}</h2>
        <div v-if="post.image" class="mb-4">
  <img :src="`/storage/${post.image}`" class="rounded shadow-md max-h-60 object-cover w-full" />
  </div>

        <p class="text-gray-600 mt-2">{{ post.content }}</p>

        <div class="flex gap-4 mt-4">
          <Link
            :href="`/posts/${post.id}/edit`"
            class="text-blue-600 "
            style="font-size: 20px;font-weight: 600; padding-right: 10px;
                  text-align: center;width: 50%;background-color: #C4E1E6;border-top: 2px solid rgb(37 99 235);
                  padding-top: 10px;border-bottom: 2px solid rgb(37 99 235) ;padding-bottom: 10px; 
                  border-radius: 20px;" >
             Edit
          </Link>
          <button
            @click="deletePost(post.id)"
            class="text-red-600 "
            style="font-size: 20px;font-weight: 600; padding-right: 10px;text-align: center;width: 50%;
                  border-top: 2px solid rgb(220 38 38) ;padding-top: 10px;border-bottom: 2px solid rgb(220 38 38) ;
                  padding-bottom: 10px;border-radius: 20px;background-color: rgb(252 165 165);"
          >
             Delete
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link , router } from '@inertiajs/vue3';
defineProps({ posts: Array });

const deletePost = (id) => {
  if (confirm('Are you sure you want to delete this post?')) {
    router.delete(`/posts/${id}`);
  }
};
</script>
