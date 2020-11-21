import Vue from 'vue'
import VueRouter from 'vue-router'
// import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  // {
  //   path: '/',
  //   name: 'Home',
  //   component: Home
  // },
  // {
  //   path: '/about',
  //   name: 'About',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  // }
  // {
  //   path: '/',
  //   redirect: '/'
  // },
  {
    path: '/',
    component: () => import('../components/common/Home'),
    meta: { title: '首页' },
    children: [
      {
        path: '/Attendance',
        meta: { title: '考勤管理' },
        component: () => import('../components/page/Attendance')
      },
      {
        path: '/Personnel',
        meta: { title: '人事管理' },
        component: () => import('../components/page/Personnel')
      },
      {
        path: '/Recruitment',
        meta: { title: '招聘管理' },
        component: () => import('../components/page/Recruitment')
      },
      {
        path: '/Salary',
        meta: { title: '薪酬管理' },
        component: () => import('../components/page/Salary')
      },
      {
        path: '/System',
        meta: { title: '系统管理' },
        component: () => import('../components/page/System')
      }
    ]
  },
  {
    path: '/login',
    component: () => import('../components/page/Login.vue'),
    meta: { title: '登录' }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
