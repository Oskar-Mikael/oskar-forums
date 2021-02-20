<template>
  <div v-text="Test"
    id="threads-delete-message"
    class="text-2xl text-white text-center mt-20 bg-green-500 w-1/2 mx-auto py-1 rounded border-black border-2"
  >
    
    <button
      id="threads-delete-message-button"
      class="float-right mr-5 outline-none">
      X
    </button>
  </div>
</template>

<script>
export default {
    name: "MessageComponent",
}

</script>