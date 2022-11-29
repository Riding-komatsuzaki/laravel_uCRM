<script setup>
import GuestLayoutVue from '@/Layouts/GuestLayout.vue';
import InputLabelVue from '@/Components/InputLabel.vue';
import TextInputVue from '@/Components/TextInput.vue';

const emitTest = e => console.log(e);
</script>

<template>
<GuestLayoutVue>
  <InputLabelVue value="件名">タイトル</InputLabelVue>
  <TextInputVue modelValue="初期値" @update:modelValue="emitTest"></TextInputVue>
</GuestLayoutVue>
</template>