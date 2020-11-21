<template>
    <div class="wrapper">
      <j-head></j-head>
      <j-sidebar></j-sidebar>
      <div class="content_box">
        <router-view></router-view>
      </div>
    </div>
</template>

<script>
import jHead from './Header'
import jSidebar from './Sidebar'

export default {
  name: 'Home',
  components: {
    jHead,
    jSidebar
  }
}
</script>

<style scoped>

</style>
