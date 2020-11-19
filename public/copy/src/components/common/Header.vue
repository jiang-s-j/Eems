<template>
    <div class="header">
      <div class="collapse-btn">
        <i class="el-icon-s-operation" @click="changeCollapse"></i>
      </div>
      <div class="logo">人力资源管理系统</div>
      <div class="header-right">
        <div class="header-right-flex">
          <div class="header-right-badge common">
            <el-badge is-dot class="item">
<!--              <el-button icon="el-icon-search" circle></el-button>-->
              <i class="el-icon-bell"></i>
            </el-badge>
          </div>
          <div class="header-right-avatar common">
            <span class="j-avatar">
              <img src="../../assets/img/img.jpg" alt="">
            </span>
          </div>
          <el-dropdown class="common">
  <span class="el-dropdown-link">
    {{username}}<i class="el-icon-arrow-down el-icon--right"></i>
  </span>
            <el-dropdown-menu slot="dropdown">
              <el-dropdown-item>个人信息</el-dropdown-item>
              <el-dropdown-item @click.native="logout">退出</el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: 'Header',
  data () {
    return {
    }
  },
  computed: {
    username () {
      const username = localStorage.getItem('admin_name')
      return username
    }
  },
  methods: {
    changeCollapse () {
      // console.log('11')
      this.$store.commit('changeCollapse')
    },
    logout () {
      this.$confirm('确认是否退出?', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(() => {
        localStorage.removeItem('admin_name')
        this.$router.push('/login')
      }).catch(() => {
        this.$message({
          type: 'info',
          message: '已取消退出'
        })
      })
    }
  }
}
</script>

<style scoped>
.header{
  position: relative;
  width: 100%;
  height: 70px;
  font-size: 22px;
  color: #fff;
  background-color:  #242f42;
}
  .collapse-btn{
    float: left;
    /*变成bfc*/
    cursor: pointer;
    /*变成小手*/
    line-height: 70px;
    padding: 0 21px;
  }
  .logo{
    float: left;
    line-height: 70px;
  }
  .header-right{
    float: right;
    padding-right: 50px;
    align-items: center;
  }
  .header-right-flex{
    height: 70px;
    /*border: 1px solid red;*/
    display: flex;
    align-items: center;
    justify-content: space-evenly;
  }
  .header-right-badge{
    width: 30px;
    height: 30px;
    cursor: pointer;
  }
  .item{
    width: 30px;
    height: 30px;
  }
  .header-right-avatar{
    width: 50px;
    height: 50px;
  }
  .j-avatar{
    width: 100%;
    height: 100%;
    display: inline-block;
  }
  .j-avatar img{
    width: 100%;
    height: 100%;
    border-radius:50% ;
  }
  .common {
    margin: 0 10px;
  }
  .el-dropdown-link{
    cursor: pointer;
    color: white;
    /*color: #409EFF;*/
  }
</style>
