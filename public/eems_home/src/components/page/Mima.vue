<template>
  <div>
    <div>
      <el-table
        :data="tableData"
        element-loading-text="拼命加载中"
        style="width: 90%">
        <el-table-column
          label="id"
          width="100">
          <template slot-scope="scope">
            <i class="el-icon-time"></i>
            <span style="margin-left: 10px">{{ scope.row.Id }}</span>
          </template>
        </el-table-column>
        <el-table-column
          label="昵称"
          width="100">
          <template slot-scope="scope">
            <el-popover trigger="hover" placement="top">
              <p>姓名: {{ scope.row.nickname }}</p>
              <p>住址: {{ scope.row.addres }}</p>
              <div slot="reference" class="name-wrapper">
                <el-tag size="medium">{{ scope.row.nickname }}</el-tag>
              </div>
            </el-popover>
          </template>
        </el-table-column>
        <el-table-column
          label="邮箱"
          width="200">
          <template slot-scope="scope">
            <i class="el-icon-time"></i>
            <span style="margin-left: 10px">{{ scope.row.email}}</span>
          </template>
        </el-table-column>
        <el-table-column
          label="薪酬"
          width="">
          <template slot-scope="scope">
            <i class="el-icon-time"></i>
            <span style="margin-left: 10px">{{ scope.row.pay}}</span>
          </template>
        </el-table-column>
        <el-table-column
          label="是否请假"
          width="">
          <template slot-scope="scope">
            <i class="el-icon-time"></i>
            <span style="margin-left: 10px">{{ scope.row.leave}}</span>
          </template>
        </el-table-column>
        <el-table-column label="操作">
          <template slot-scope="scope">
            <el-button
              size="mini"
              @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
            <el-button
              size="mini"
              type="danger"
              @click="handleDelete(scope.$index, scope.row)">删除</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <el-dialog title="编辑" :visible.sync="editVisible" width="30%">
      <el-form ref="form" :model="form" label-width="70px">
        <el-form-item label="昵称">
          <el-input v-model="form.nickname"></el-input>
        </el-form-item>
        <el-form-item label="地址">
          <el-input v-model="form.addres"></el-input>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
                <el-button @click="editVisible = false">取 消</el-button>
                <el-button type="primary" @click="saveEdit">确 定</el-button>
            </span>
    </el-dialog>
  </div>
</template>
<script>
import { fr } from '../../api/system'
import { mima } from '../../api/navi'
import { san } from '../../api/shanchu'
export default {
  data () {
    return {
      /* tableData: [{
        Id: '2016-05-02',
        nickname: '王小虎',
        email: '上海市普陀区金沙江路 1518 弄',
        password: '123',
        pay: 122,
        leave: '否'
      }, {
        Id: '2016-05-02',
        nickname: '王小虎',
        email: '上海市普陀区金沙江路 1518 弄',
        password: '123',
        pay: 122,
        leave: '否'
      }, {
        Id: '2016-05-02',
        nickname: '王小虎',
        email: '上海市普陀区金沙江路 1518 弄',
        password: '123',
        pay: 122,
        leave: '否'
      }, {
        Id: '2016-05-02',
        nickname: '王小虎',
        email: '上海市普陀区金沙江路 1518 弄',
        password: '123',
        pay: 122,
        leave: '否'
      }], */
      tableData: [],
      idx: -1,
      editVisible: false,
      form: {}
    }
  },
  created () {
    this.getAllList()
  },
  methods: {
    getAllList () {
      fr().then((response) => {
        this.tableData = response
      }).catch(function (error) {
        console.log(error)
      })
    },
    handleEdit (index, row) {
      this.idx = index
      this.form = row
      this.editVisible = true
    },
    saveEdit () {
      mima(this.form).then((response) => {
        console.log(response)
        if (response) {
          this.editVisible = false
          this.$message.success(`修改第 ${this.idx + 1} 行成功`)
        }
      }).catch(function (error) {
        console.log(error)
      })
    },
    handleDelete (index, row) {
      san(row).then((response) => {
        if (response) {
          this.getAllList()
          this.$message.success(`删除第 ${this.idx + 1} 行成功`)
        }
      }).catch(function (error) {
        console.log(error)
      })
    }
  }
}
</script>
<style scoped>
</style>
