<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <span>条件筛选</span>
      </div>
      <div>
        <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
          <el-form-item label="工作地点" prop="region">
            <el-select v-model="ruleForm.region" placeholder="请选择活动区域">
              <el-option label="公司总部" value="公司总部"></el-option>
              <el-option label="分公司" value="分公司"></el-option>
            </el-select>
          </el-form-item>
          <el-form-item label="招聘情况" prop="resource">
            <el-radio-group v-model="ruleForm.resource">
              <el-radio label="正在招聘"></el-radio>
              <el-radio label="招聘完成"></el-radio>
            </el-radio-group>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="submitForm('ruleForm')">搜索</el-button>
          </el-form-item>
        </el-form>
      </div>
    </el-card>

    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <span>招聘详情</span>
      </div>
      <div class="text item">
        <el-table
          :data="tableData"
          stripe
          style="width: 100%">
          <el-table-column
            prop="name"
            label="工作名称"
            width="180">
          </el-table-column>
          <el-table-column
            prop="status"
            label="招聘状态"
            width="180">
          </el-table-column>
          <el-table-column
            prop="location"
            label="地址">
          </el-table-column>
        </el-table>
      </div>
      <el-pagination
        background
        layout="prev, pager, next"
        @current-change="onCurrentChange"
        :total="count">
      </el-pagination>
    </el-card>

  </div>
</template>

<script>
import { getRecruitment } from '../../api/recruitment'

export default {
  name: 'Recruitment',
  data () {
    return {
      ruleForm: {
        region: '',
        delivery: false,
        resource: ''
      },
      tableData: [],
      rules: {
        region: [
          { required: true, message: '请选择工作地点', trigger: 'change' }
        ],
        resource: [
          { required: true, message: '请选择招聘情况', trigger: 'change' }
        ]
      },
      page: 1,
      count: 0
    }
  },
  methods: {
    submitForm (formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          getRecruitment({
            status: this.ruleForm.resource,
            location: this.ruleForm.region,
            page: this.page
          }).then(res => {
            // console.log(res)
            this.count = res.count
            this.tableData = res.data
          })
        } else {
          console.log('error submit!!')
          return false
        }
      })
    },
    resetForm (formName) {
      this.$refs[formName].resetFields()
    },
    onCurrentChange (page) {
      // console.log(page)
      this.page = page
      getRecruitment({
        status: this.ruleForm.resource,
        location: this.ruleForm.region,
        page: page
      }).then(res => {
        // console.log(res)
        this.count = res.count
        this.tableData = res.data
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
    margin:20px;
  }
</style>
