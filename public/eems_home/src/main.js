import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.config.productionTip = false
Vue.use(ElementUI)
router.beforeEach((to, from, next) => {
  document.title = `${to.meta.title}`
  const role = localStorage.getItem('admin_name')
  if (!role && to.path !== '/login') {
    next('/login')
  }
  next()
})

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
