

import Dashboard from './components/Dashboard.vue';
const DepartmentList = () => import('./components/department/List.vue');
const addDepartment = () => import('./components/department/create.vue');
const editDepartment = () => import('./components/department/edit.vue');
const classList = () => import('./components/class-setup/ClassList.vue');
const createClass = () => import('./components/class-setup/CreateClass.vue');
const unitList = () => import('./components/units/unitList.vue');

export const routes = [
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },

    {
        name: 'departmentList',
        path: '/departments',
        component: DepartmentList
    },
    {
        name: 'create',
        path: '/create',
        component: addDepartment
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: editDepartment
    },
    {
        name: 'classList',
        path: '/classes',
        component: classList
    },

    {
        name: 'class.create',
        path: '/class/create',
        component: createClass
    },
    {
        name: 'unitList',
        path: '/units',
        component: unitList
    },

];
