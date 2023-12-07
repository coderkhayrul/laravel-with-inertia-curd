<script setup>

import {router} from "@inertiajs/vue3";

defineProps({
    customers: Object,
});

function destroy(id) {
    router.delete(`/customers/${id}`);
}
function edit(id)
{
    router.get(`/customers/${id}/edit`);
}
</script>

<template>
    <div class="card col-8 offset-2">
        <div v-if="$page.props.flash.success" class="alert alert-success alert-dismissible fade show m-3 py-4" role="alert">
            <strong>{{ $page.props.flash.success }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="card-header">
            All Customers
            <button @click.prevent="router.get('/customers/create')" class="btn btn-primary btn-sm float-end">Add New</button>
        </div>
        <div class="card-body">
            <!-- All Customer Show On Table -->
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Email</th>
                    <th scope="col">Customer Phone</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(customer, index) in customers" :key="customer.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ customer.name }}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.phone }}</td>
                    <td>
                        <button @click.prevent="edit(customer.id)" class="btn btn-primary btn-sm me-2">Edit</button>
                        <button @click.prevent="destroy(customer.id)" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>

</style>
