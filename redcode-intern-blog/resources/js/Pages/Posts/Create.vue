<script setup>
import FormComponent from './FormComponent.vue'

const submitHandler = (form) => {
  form.post('/posts',
     { forceFormData: true 

     });
}
</script>

<template>
  <FormComponent
    :formTitle="'Create New Post'"
    :buttonText="'Create'"
    :submitHandler="submitHandler"
  />
</template>
