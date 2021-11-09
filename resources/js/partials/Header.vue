<template>
    <header>
        <nav>
            <div class="ms_container-nav">
                <div class="float-start ms_logo-container">
                    <img src="/img/logo-cattolici.png" alt="I CATTOLICI">
                </div>

                <div class="float-end">
                    login
                </div>
            </div>
        </nav>
    </header>
</template>

<script>

export default {
    name: 'Header'
}

</script>

<style scoped lang="scss">

    @import '../../sass/app.scss';

    header{
        height: 70px;
        line-height: 70px;
        vertical-align: middle;
        background-color: $blue;
        padding: 0 15px;

            .ms_logo-container{
                width: 50px;
                
                img{
                    width: 100%;
                    height: 50px;
                    border-radius: 50%;
                }
            }
    }


</style>
