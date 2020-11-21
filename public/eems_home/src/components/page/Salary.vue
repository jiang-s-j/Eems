<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <span>工资详情</span>
        <el-button style="float: right; padding: 3px 0" type="text">操作按钮</el-button>
      </div>
      <div  class="text item">
        <el-table
          v-loading="loading"
          :data="tableData"
          stripe
          style="width: 100%">
          <el-table-column
            prop="email"
            label="姓名"
            width="180">
          </el-table-column>
          <el-table-column
            prop="base"
            label="基础工资"
            width="180">
          </el-table-column>
          <el-table-column
            prop="bonus"
            label="提成"
            width="180">
          </el-table-column>
          <el-table-column
            prop="a_bonus"
            label="全勤奖"
            width="180">
          </el-table-column>
          <el-table-column
            prop="all"
            label="总工资"
            width="180">
          </el-table-column>
        </el-table>
      </div>
    </el-card>
  </div>
</template>

<script>
import { salary } from '../../api/salary'
export default {
  name: 'Salary',
  data () {
    return {
      loading: false,
      tableData: []
    }
  },
  created () {
    this.getSalary()
  },
  methods: {
    getSalary () {
      const username = localStorage.getItem('admin_name')
      salary({ email: username }).then(res => {
        console.log(res)
        this.tableData = res
      })
    }
  }
}
</script>

<style scoped>
  .text {
    font-size: 14px;
  }

  .item {
    margin-bottom: 18px;
  }

  .clearfix:before,
  .clearfix:after {
    display: table;
    content: "";
  }
  .clearfix:after {
    clear: both
  }

  .box-card {
    width: 85%;
    margin: 20px;
  }
</style>
