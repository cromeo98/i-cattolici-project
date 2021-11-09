<template>
  <div class="app">

    <Header/>
    
    <main>

      <div class="container">
        <nav class="text-center">
          <div class="row justify-content-center pt-5">
            <div class="col-2 pt-5">
              <a href="#" class="ms_main-nav-links">La squadra</a>
            </div>
            <div class="col-2 pt-5">
              <a href="#" class="ms_main-nav-links">News</a></div>
            <div class="col-2 pt-5">
              <a href="#" class="ms_main-nav-links">Risultati</a></div>
            <div class="col-2 pt-5">
              <a href="#" class="ms_main-nav-links">Sponsorships</a></div>
            <div class="col-2 pt-5">
              <a href="#" class="ms_main-nav-links">Competizioni</a></div>
            <div class="col-2 pt-5">
              <a href="#" class="ms_main-nav-links">Contattaci</a></div>
          </div>
        </nav>
      </div>
      <!-- <router-view></router-view> -->

    </main>  

    <Footer/>

  </div>

</template>

<script>
  import Header from '../partials/Header';
  import Footer from '../partials/Footer';

  export default {
    name: 'App',
    components: {
      Header,
      Footer
    }
  }
</script>

<style lang="scss">

  @import '../../sass/app';

  main{
    height: calc(100vh - 170px);
    background-image: url('../../img/bg-home.png');
    background-size: cover;
    background-position: -7px;

    .ms_main-nav-links{
      background-color: $yellow;
      opacity: 0.8;
      color: rgb(33, 37, 41);
      text-decoration: none;
      padding: 10px 15px;
      border-radius: 25px;
          &:hover{
            color: inherit;
            opacity: 1;
          }
    }
  }

</style>