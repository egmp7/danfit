<template>
<div id="navbar" v-on:setWorkOutData="setWorkOutData">
    <img src="/img/logo.png" alt="DanFitCenter_logo">
    <div class="menu">
        <router-link to="/">
            <div class="element">
                <i class="fas fa-tachometer-alt fa-2x"></i>
                <p>DASHBOARD</p>
            </div>
        </router-link>
        <router-link to="/programa">
            <div class="element">
                <i class="fas fa-dumbbell fa-2x"></i>
                <p>PROGRAMA</p>
            </div>
        </router-link>
        <router-link to="/calendario">
            <div class="element">
                <i class="fas fa-calendar-alt fa-2x"></i>
                <p>CALENDARIO</p>
            </div>
        </router-link>
        <div class="element">
            <i class="fas fa-utensils fa-2x"></i>
            <p>NUTRICIÓN</p>
        </div>
        <div class="element">
            <i class="fas fa-gem fa-2x"></i>
            <p>BONUS</p>
        </div>
        <div class="element">
            <i class="fab fa-facebook-square fa-2x"></i>
            <p>AYUDA</p>
        </div>
        <router-link to="/configuracion">
            <div class="element">
                <i class="fas fa-cogs fa-2x"></i>
                <p>CONFIG</p>
            </div>
        </router-link>
    </div>
</div>
</template>

<script>
export default {
    methods:{
        setWorkOutData(){
            console.log('esto es la nav perro')
        }
    }
}
</script>