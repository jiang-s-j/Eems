<template>
  <div class="sidebar">
    <el-menu
      :collapse="this.$store.state.isCollapse"
      router
      default-active="2"
      class="el-menu-vertical-demo ul-height"
      background-color="#324157"
      text-color="#bfcbd9"
      active-text-color="#20a0ff">
      <template v-for="item in items">
        <template v-if="item.subs">
          <el-submenu :index="item.index" :key="item.index" >
            <template slot="title">
              <i :class="item.icon"></i>
              <span>{{item.title}}</span>
            </template>
            <template v-for="subitem in item.subs">
              <el-menu-item-group :index="subitem.index" :key="subitem.index">
                <el-menu-item :index="subitem.index">{{subitem.title}}</el-menu-item>
              </el-menu-item-group>
            </template>
          </el-submenu>
        </template>
        <template v-else>
          <el-menu-item :index="item.index" :key="item.index">
            <i :class="item.icon"></i>
            <span slot="title">{{item.title}}</span>
          </el-menu-item>
        </template>
      </template>
    </el-menu>
  </div>
</template>

<script>
export default {
  name: 'Sidebar',
  data () {
    return {
      items: [
        {
          icon: 'el-icon-location-outline',
          index: '/Attendance',
          title: '考勤管理'
        },
        {
          icon: 'el-icon-phone',
          index: '/Personnel',
          title: '人事管理'
        },
        {
          icon: 'el-icon-share',
          index: '/Recruitment',
          title: '招聘管理'
        },
        {
          icon: 'el-icon-share',
          index: '/Salary',
          title: '薪酬管理'
        },
        {
          icon: 'el-icon-share',
          index: '/System',
          title: '系统管理'
        }
      ]
      // isCollapse: this.$store.state.isCollapse
    }
  },
  methods: {
  }
}
</script>

<style scoped>
  .sidebar{
    position: absolute;
    top: 70px;
    bottom: 0;
    width: auto;
    display: block;
    overflow-y: auto;
  }
  .sidebar::-webkit-scrollbar {
    width: 0;
  }
  .sidebar:not(.el-menu--collapse) {
    width: 250px;
  }
  .ul-height{
    height: 100%;
  }
</style>
