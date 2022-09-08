

import AllLevels from './components/levels/Level.vue';
import CreateLevel from './components/levels/create.vue';
import Dashboard from './components/Dashboard.vue';
//import EditProduct from './components/EditProduct.vue';
export const routes = [
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'home',
        path: '/levels',
        component: AllLevels
    },
    {
        name: 'create',
        path: '/create',
        component: CreateLevel
    }
    // {
    //     name: 'edit',
    //     path: '/edit/:id',
    //     component: EditProduct
    // }
];
