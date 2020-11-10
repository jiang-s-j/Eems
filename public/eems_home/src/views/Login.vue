<template>
  <div class="Login" style="width: 100%">
    <el-form
      :model="ruleForm"
      status-icon
      :rules="rules"
      ref="ruleForm"
      label-width="60px"
      class="demo-ruleForm"
      style="width: 400px; margin: 0 auto"
    >
      <el-form-item style="margin-left: -60px">
        <h3 class="title" style="margin: 0 auto; width: 100%">登录平台</h3>
      </el-form-item>
      <el-form-item label="用户名" prop="pass">
        <el-input
          type="text"
          v-model="ruleForm.pass"
          autocomplete="off"
        ></el-input>
      </el-form-item>
      <el-form-item label="密码" prop="Pass">
        <el-input
          type="password"
          v-model="ruleForm.checkPass"
          autocomplete="off"
        ></el-input>
      </el-form-item>
      <el-form-item style="margin-left: -60px">
        <el-button
          type="primary"
          @click="login()"
          style="width: 100px; margin: 0 auto"
          >确认</el-button
        >
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
export default {
  data () {
    var validatePass = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('请输入用户名'))
      } else {
        if (this.ruleForm.checkPass !== '') {
          this.$refs.ruleForm.validateField('checkPass')
        }
        callback()
      }
    }
    var validatePass2 = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('请再次输入密码'))
      } else if (value !== this.ruleForm.pass) {
        callback(new Error('两次输入密码不一致!'))
      } else {
        callback()
      }
    }
    return {
      ruleForm: {
        pass: '',
        checkPass: '',
        message: ''
      },
      rules: {
        pass: [{ validator: validatePass, trigger: 'blur' }],
        checkPass: [{ validator: validatePass2, trigger: 'blur' }]
      }
    }
  },
  methods: {
    login () {
      this.$axios
        .post('http://127.0.0.1:8012/index/log_in', {
          account: this.ruleForm.pass,
          password: this.ruleForm.checkPass
        })
        .then((res) => {
          // this.message = res.data;
          if (res.data.code === 1) {
            alert(res.data.message)
            console.log(res.data.code)
            this.$router.push({ path: 'Home' })
          } else {
            alert(res.data.message)
            console.log(res.data.code)
          }
          // console.log(res.data.account)
        })
      // alert(this.ruleForm.account)
    }
  }
}
</script>
