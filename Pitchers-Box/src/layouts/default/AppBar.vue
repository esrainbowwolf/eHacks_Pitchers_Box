<template>
  <v-app-bar :elevation="4" flat>
    <v-app-bar-title class="align"
      ><span class="siu">siu</span><span class="e">e</span>
      <span class="teamName">Pitcher's Box</span>
    </v-app-bar-title>
  </v-app-bar>
</template>

<script setup>
//
</script>

<style>
.align {
  /* text align to right of img */
  /* vertical-align: left; */
  /* text-align: left; */
  font-size: 10px;
}
.teamName {
  margin-left: 550px;
  font-size: 27px;
  font-weight: bold;
  text-align: center;
}
.siu {
  /* text align to right of img */
  vertical-align: left;
  text-align: left;
  font-weight: bold;
  font-size: 37px;
  color: #000;
}
.e {
  font-size: 37px;
  font-weight: bold;
  color: #d9001e;
}
</style>
