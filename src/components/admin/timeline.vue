<template>
  <main class='about-info'>
    <div class="row-nw jc-center">
      <card></card>
    </div>
  </main>
</template>

<script>
  import card from './../timeline/card';

  export default {
    name: 'timeline',
    components: { card },
  };
</script>
