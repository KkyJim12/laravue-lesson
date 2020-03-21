<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Edit</h1>
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
                        @click="UpdateProduct()"
                    >
                        แก้ไข
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getProductInfo();
    },
    data() {
        return {
            name: "",
            price: "",
            qty: "",
            error: null
        };
    },
    methods: {
        getProductInfo() {
            axios
                .get("/api/product/" + this.$route.params.id)
                .then(response => {
                    console.log(response.data);
                    this.name = response.data.data.name;
                    this.price = response.data.data.price;
                    this.qty = response.data.data.qty;
                });
        },
        UpdateProduct() {
            axios
                .put("/api/product/" + this.$route.params.id, {
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
