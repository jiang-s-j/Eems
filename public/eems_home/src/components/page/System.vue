<template>
  <el-tabs v-model="activeName" @tab-click="handleClick">
    <el-tab-pane label="用户管理" name="second"><Mima/></el-tab-pane>
    <el-tab-pane label="密码修改" name="first"><Xiugai/></el-tab-pane>
    <el-tab-pane label="薪酬" name="third"><xincou/></el-tab-pane>
    <el-tab-pane label="请假批准" name="fourth"><qingjia/></el-tab-pane>
  </el-tabs>
</template>
<script>
import Mima from './Mima'
import Xiugai from './Xiugai'
import xincou from './xincou'
import qingjia from './qingjia'
export default {
  name: 'System',
  components: {
    Mima,
    Xiugai,
    xincou,
    qingjia
  },

  data () {
    return {
      activeName: 'second'
    }
  },
  methods: {
    handleClick (tab, event) {
      console.log(tab, event)
    }
  }
}
</script>
