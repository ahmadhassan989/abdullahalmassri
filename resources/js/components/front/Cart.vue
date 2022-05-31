<template>
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="container-fluid">
                <div class="row align-items-start">
                    <div class="col-12 col-sm-8 items">
                        <!--1-->
                        <div class="cartItem row align-items-start">
                            <div class="col-3 mb-2">
                                <img
                                    class="card-img-top"
                                    :src="'/images/siteImages/07.jpg'"
                                    alt="..."
                                />
                            </div>
                            <div class="col-5 mb-2">
                                <h6 class="">Dark Art 1</h6>
                                <p class="pl-1 mb-0">20 x 24</p>
                                <p class="pl-1 mb-0">Matte Print</p>
                            </div>
                            <div class="col-2">
                                <p class="cartItemQuantity p-1 text-center">
                                    1
                                </p>
                            </div>
                            <div class="col-2">
                                <p id="cartItem1Price">$66</p>
                            </div>
                        </div>
                        <hr />
                        <!--2-->
                        <div class="cartItem row align-items-start">
                            <div class="col-3 mb-2">
                                <img
                                    class="card-img-top"
                                    :src="'/images/siteImages/08.jpg'"
                                    alt="..."
                                />
                            </div>
                            <div class="col-5 mb-2">
                                <h6 class="">Dark Art 2</h6>
                                <p class="pl-1 mb-0">20 x 24</p>
                                <p class="pl-1 mb-0">Matte Print</p>
                            </div>
                            <div class="col-2">
                                <p class="cartItemQuantity p-1 text-center">
                                    1
                                </p>
                            </div>
                            <div class="col-2">
                                <p id="cartItem1Price">$66</p>
                            </div>
                        </div>
                        <hr />
                    </div>
                    <div class="col-12 col-sm-4 p-3 proceed form">
                        <div class="row m-0">
                            <div class="col-sm-8 p-0">
                                <h6>Subtotal</h6>
                            </div>
                            <div class="col-sm-4 p-0">
                                <p id="subtotal">$132.00</p>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-sm-8 p-0">
                                <h6>Tax</h6>
                            </div>
                            <div class="col-sm-4 p-0">
                                <p id="tax">$6.40</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row mx-0 mb-2">
                            <div class="col-sm-8 p-0 d-inline">
                                <h5>Total</h5>
                            </div>
                            <div class="col-sm-4 p-0">
                                <p id="total">$138.40</p>
                            </div>
                        </div>
                        <form  @submit.prevent="checkPromocodeUsage" >
                          <div>
                            <input type="text" placeholder="promocode" v-model="promocode" name="promocode" >
                            <has-error :form="form" field="promocode"></has-error>
                          </div>

                        </form>

                        <a class="btn btn-outline-dark" href="/cart">
                            Check out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  
    data() {
        return {
            form: new Form({
                promocode: "eee",
            }),
        };
    },
    methods: {
        checkPromocodeUsage() {debugger;
            axios.post("/checkPromocodeUsage").then((response) => {
                var attr = document.getElementById("text");
                attr.innerHTML = response.data.message;
                this.form.reset();
            });
        },
    },
};
</script>
<style scoped></style>
