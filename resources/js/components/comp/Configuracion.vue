<template>
  <div id="config">
    <img v-bind:src="'../storage/user_image/'+user.main.user_image" alt="User Image" />
    <p>{{user.main.name}}</p>

    <div class="form-group">
      <div class="wrap">
        <button class="btn btn-secondary btn-lg btn-block">Cambiar Foto</button>
        <input class="file" type="file" name id />
      </div>
    </div>

    <br />
    <br />
    <a
      class="dropdown-item"
      href="/logout"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    ><button class="btn btn-danger btn-lg btn-block">Logout</button>
    </a>

    <!-- <a
      class="dropdown-item"
      href="/logout"
      onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"
    >
      <button class="btn btn-danger btn-lg btn-block">{{ __('Logout') }}</button>
    </a> -->
  </div>
</template>

<script>
export default {
  name: "Configuracion",
  props:["user"]
}
</script>