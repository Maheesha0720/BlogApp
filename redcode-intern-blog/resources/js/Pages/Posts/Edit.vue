<script setup>
import FormComponent from './FormComponent.vue'


const props = defineProps({ post: Object });


const submitHandler = (form) => {
  form.put(`/posts/${props.post.id}`,{
    forceFormDtata:true,
  });
};
</script>

<template>
  <FormComponent
    :post="props.post"
    formTitle="Edit Post"
    buttonText="Update"
    :submitHandler="submitHandler"
  />
</template>

