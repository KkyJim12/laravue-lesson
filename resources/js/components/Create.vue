<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Create</h1>
                    <div v-if="error" class="alert alert-danger form-control">
                        {{ error }}
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control" v-model="name" />
                    <label>Price</label>
                    <input type="number" class="form-control" v-model="price" />
                    <label>Qty</label>
                    <input type="number" class="form-control" v-model="qty" />
                    <button
                        class="btn btn-primary form-control mt-2"
                        @click="CreateProduct()"
                    >
                        สร้าง
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            price: "",
            qty: "",
            error: null
        };
    },
    methods: {
        CreateProduct() {
            axios
                .post("/api/product", {
                    name: this.name,
                    price: this.price,
                    qty: this.qty
                })
                .then(response => {
                    this.$router.push("/");
                })
                .catch(error => {
                    this.error = "something wrong";
                });
        }
    }
};
</script>
