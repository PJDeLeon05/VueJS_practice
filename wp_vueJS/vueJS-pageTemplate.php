<?php
/*
*   The template for sample VueJS
*/
get_header();

//Content
?><script src="<?php echo plugin_dir_path( __FILE__ ) . '/pageTemplate.js'; ?>"></script>
<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ) . '/pageTemplate.css">
<div id="mainDiv">
  <div :class="gender">
    <p>Name : {{ name }}</p>
    <p>Home Address : {{ address }}</p>
    <p>Contact Number : {{ cpNumber }}</p>
    <p>Email: {{ email }}</p>
  </div>
  <div><p>Enter Name: </p><input v-model="name"></div>
  <div><p>Enter Address: </p><input v-model="address"></div>
  <div><p>Enter Contact Number: </p><input v-model="cpNumber"></div>
  <div><p>Enter Email: </p><input v-model="email"></div>
  <button :class="gender" v-on:click="changeColorBasedonGender()">Click here to select Gender</button>
</div>

<?php get_footer();
