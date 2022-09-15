

import Dashboard from './components/Dashboard.vue';

const DepartmentList = () => import('./components/department/List.vue');
const addDepartment = () => import('./components/department/create.vue');
const editDepartment = () => import('./components/department/edit.vue');
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
    }
];
