<template>
  <el-table
    :data="tableData"
    style="width: 100%">
    <el-table-column
      label="名字"
      width="">
      <template slot-scope="scope">
        <i class="el-icon-time"></i>
        <span style="margin-left: 10px">{{ scope.row.email }}</span>
      </template>
    </el-table-column>
    <el-table-column
      label="请假状态"
      width="180">
      <template slot-scope="scope">
        <i class="el-icon-time"></i>
        <span style="margin-left: 10px">{{ scope.row.leave }}</span>
      </template>
    </el-table-column>
    <el-table-column label="操作">
      <template slot-scope="scope">
        <el-button
          size="mini"
          @click="handleEdit(scope.$index, scope.row)">批准</el-button>
        <el-button
          size="mini"
          type="danger"
          @click="handleDelete(scope.$index, scope.row)">拒绝</el-button>
      </template>
    </el-table-column>
  </el-table>
</template>
<script>
import { fr } from '../../api/system'
import { qingjia } from '../../api/qingjia'
export default {
  name: 'qingjia',
  data () {
    return {
      /* tableData: [{
        email: '2016-05-02',
        leave: '王小虎'
      }, {
        email: '2016-05-02',
        leave: '王小虎'
      }, {
        email: '2016-05-02',
        leave: '王小虎'
      }, {
        email: '2016-05-02',
        leave: '王小虎'
      }] */
      tableData: '',
      i: 0
    }
  },
  created () {
    this.get()
  },
  methods: {
    get () {
      fr().then((response) => {
        console.log(response.data)
        this.tableData = response
      }).catch(function (error) {
        console.log(error)
      })
    },
    handleEdit (index, row) {
      this.i = 1
      qingjia(row.email, this.i).then((response) => {
        alert('批准成功')
        console.log(index, row)
        this.get()
      }).catch(function (error) {
        console.log(error)
      })
      console.log(index, row)
    },
    handleDelete (index, row) {
      this.i = 0
      qingjia(row.email, this.i).then((response) => {
        alert('拒绝请假')
        this.get()
      }).catch(function (error) {
        console.log(error)
      })
    }
  }
}
</script>
