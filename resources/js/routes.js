

import Dashboard from './components/Dashboard.vue';
const DepartmentList = () => import('./components/department/List.vue');
const addDepartment = () => import('./components/department/create.vue');
const editDepartment = () => import('./components/department/edit.vue');
const classList = () => import('./components/class-setup/ClassList.vue');
const createClass = () => import('./components/class-setup/CreateClass.vue');
const editClass = () => import('./components/class-setup/EditClass.vue');
const unitList = () => import('./components/units/unitList.vue');
const createUnit = () => import('./components/units/createUnit.vue');
const editUnit = () => import('./components/units/editUnit.vue');
const lessonList = () => import('./components/lessons/lessonList.vue');

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
        name: 'class.edit',
        path: '/class/:id',
        component: editClass
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
    {
        name: 'unit.create',
        path: '/units/create',
        component: createUnit
    },
    {
        name: 'unit.edit',
        path: '/units/edit/:id',
        component: editUnit
    },
    {
        name: 'lessonList',
        path: '/lessons',
        component: lessonList
    },

];
