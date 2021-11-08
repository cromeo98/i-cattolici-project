<template>
  <div class="app">

    <Header/>
    
    <!-- <main>

      <router-view></router-view>

    </main>   -->

    <!-- <Footer/> -->

  </div>

</template>

<script>
  import Header from '../partials/Header';
//   import Footer from '../partials/Footer';

  export default {
    name: 'App',
    components: {
      Header
    //   Footer
    }
  }
</script>

<style lang="scss">

  @import '../../sass/commons';

</style>