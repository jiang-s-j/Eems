<template>
  <el-table
    :data="tableData"
    border
    height="400"
    :summary-method="getSummaries"
    show-summary
    style="width: 100%; margin-top: 20px">
    <el-table-column
      prop="Id"
      label="Id"
      width="180">
    </el-table-column>
    <el-table-column
      prop="nickname"
      label="姓名">
    </el-table-column>
    <el-table-column
      prop="pay"
      label="数值 1（元）">
    </el-table-column>
  </el-table>
</template>
<script>
import { fr } from '../../api/system'
export default {
  name: 'xincou',
  data () {
    return {
      tableData: [{
        Id: '12987122',
        nickname: '王小虎',
        pay: '234'
      }, {
        Id: '12987122',
        nickname: '王小虎',
        pay: '234'
      }, {
        Id: '12987122',
        nickname: '王小虎',
        pay: '234'
      }, {
        Id: '12987122',
        nickname: '王小虎',
        pay: '234'
      }, {
        Id: '12987122',
        nickname: '王小虎',
        pay: '234'
      }]
    }
  },
  created () {
    this.get()
  },
  methods: {
    get () {
      fr().then((response) => {
        this.tableData = response
      }).catch(function (error) {
        console.log(error)
      })
    },
    getSummaries (param) {
      const { columns, data } = param
      const sums = []
      columns.forEach((column, index) => {
        if (index === 0) {
          sums[index] = '总价'
          return
        }
        const values = data.map(item => Number(item[column.property]))
        if (!values.every(value => isNaN(value))) {
          sums[index] = values.reduce((prev, curr) => {
            const value = Number(curr)
            if (!isNaN(value)) {
              return prev + curr
            } else {
              return prev
            }
          }, 0)
          sums[index] += ' 元'
        } else {
          sums[index] = 'N/A'
        }
      })
      return sums
    }
  }
}
</script>

<style scoped>

</style>
