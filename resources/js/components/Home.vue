<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>CRUDS Project</h1>
                <router-link to="/create" class="btn btn-success"
                    >สร้าง</router-link
                >
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in productLists">
                            <td>{{ item.name }}</td>
                            <td>{{ item.price }}</td>
                            <td>{{ item.qty }}</td>
                            <td>
                                <router-link
                                    :to="'/edit/' + item.id"
                                    class="btn btn-warning"
                                    >Edit</router-link
                                >
                            </td>
                            <td>
                                <button
                                    @click="DeleteProduct(item.id)"
                                    class="btn btn-danger"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getProductLists();
    },
    data() {
        return {
            productLists: {}
        };
    },
    methods: {
        getProductLists() {
            axios.get("/api/product").then(response => {
                this.productLists = response.data.data;
            });
        },
        DeleteProduct(id) {
            axios.delete("/api/product/" + id).then(response => {
                this.getProductLists();
            });
        }
    }
};
</script>
