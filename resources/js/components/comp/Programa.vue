<template>
  <div id="programa">
    <h2>Selecciona tu programa de entrenamiento</h2>
    <table>
      <tr>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Sábado</th>
        <th>Domingo</th>
      </tr>
      <tr>
        <td>Name</td>
        <td>Name</td>
        <td>Name</td>
        <td>Name</td>
        <td>Name</td>
        <td>Name</td>
        <td>Name</td>
      </tr>
      <tr>
        <td>Description here bro!</td>
        <td>Description here bro!</td>
        <td>Description here bro!</td>
        <td>Description here bro!</td>
        <td>Description here bro!</td>
        <td>Description here bro!</td>
        <td>Description here bro!</td>
      </tr>
    </table>
  </div>
</template>
<script>
export default {
  data() {
    return {
      workOutInfo: {}
    };
  },
  //name: "Calendario",
  props: ["user", "workouts"],
  created() {
  },
  methods: {}
};
</script>