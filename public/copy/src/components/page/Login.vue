<template>
    <div class="login-warp">
      <div class="sys-login">
        <div class="sys-title">人事管理系统</div>
        <el-form :model="param" :rules="rules" ref="login" label-width="0px" class="sys-content" >
          <el-form-item prop="username">
            <el-input v-model="param.username" placeholder="username">
              <el-button slot="prepend" icon="el-icon-edit"></el-button>
            </el-input>
          </el-form-item>
          <el-form-item prop="password"  >
            <el-input
              type="password"
              v-model="param.password"
              placeholder="password"
              @keyup.enter.native="formSubmit"
            >
              <el-button slot="prepend" icon="el-icon-goods"></el-button>
            </el-input>
          </el-form-item>
          <el-form-item prop="check">
            <el-checkbox v-model="param.check">我已阅读并同意用户协议和隐私条款</el-checkbox>
          </el-form-item>
          <div class="sys-btn">
            <el-button type="primary" @click="formSubmit" :loading=param.loading>登录</el-button>
          </div>
        </el-form>
      </div>
    </div>
</template>

<script>
import { getLoginData } from '../../api/index'
export default {
  name: 'Login',
  data () {
    return {
      param: {
        username: '1695479391@qq.com',
        password: '789',
        loading: false,
        check: false
      },
      rules: {
        username: [
          { required: true, message: '请输入用户名', trigger: 'blur' },
          { type: 'email', message: '格式不符合', trigger: 'blur' }
          // { validator: validateUsername, trigger: 'blur' }
        ],
        password: [
          { required: true, message: '请输入密码', trigger: 'blur' },
          { min: 3, max: 10, message: '长度为3-10个字符', trigger: 'blur' }
        ],
        check: [
          {
            validator: (rule, value, callback) => {
              if (value) {
                callback()
              } else {
                callback(new Error('请勾选并同意协议'))
              }
            },
            message: '请勾选并同意协议',
            trigger: 'blur'
          }
        ]
      }
    }
  },
  methods: {
    formSubmit () {
      this.$refs.login.validate(valid => {
        if (valid) {
          this.param.loading = true
          getLoginData(this.param.username, this.param.password)
            .then(response => {
              // console.log(response.code) 传过来的为字符串
              if (response.code === '1') {
                this.$message.success('登录成功')
                localStorage.setItem('admin_name', this.param.username)
                this.$router.push('/')
                this.param.loading = false
              } if (response.code === '-1') {
                // console.log(response)
                this.$message.error('账号或密码错误')
                this.param.loading = false
              }
              // callback必须被调用
            })
        } else {
          return false
        }
      })
    }
  }
}
</script>

<style scoped>
  .login-warp{
    position: relative;
    width: 100%;
    height: 100%;
    background-image: url("../../assets/img/login-bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    /*border: 1px solid black;*/
  }
  .sys-login{
    position: absolute;
    width: 350px;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    background-color: rgba(255,255,255,0.3);
    overflow: hidden;
  }
  .sys-title{
    width: 100%;
    height: 50px;
    font-size: 20px;
    line-height: 50px;
    text-align: center;
    color: white;
    border-bottom: 1px solid white;
  }
  .sys-content{
    padding: 30px 30px;
  }
  .sys-btn{
    height: 36px;
  }
  .sys-btn button{
    width: 100%;
  }
</style>
