<template>
  <div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
      <div class="container-fluid">
        <div class="row align-items-start">
          <div class="col-12 col-sm-8 items">
            <!--1-->
            <div
              v-for="(product, index) in products"
              :key="index"
              class="cartItem row align-items-start"
            >
              <div class="col-3 mb-2">
                <img
                  class="card-img-top"
                  :src="product.productimgs[0].img_url"
                  alt="..."
                />
              </div>
              <div class="col-3 mb-2">
                <h6 class="">{{ product.product_name }}</h6>
                <p class="pl-1 mb-0">{{ product.sub_category.title }}</p>
                <p class="pl-1 mb-0">{{ product.main_category.title }}</p>
              </div>
              <div class="col-2">
                <p class="cartItemQuantity p-1 text-center">1</p>
              </div>
              <div class="col-2">
                <p class="cartItemQuantity p-1 text-center">
                  {{ product.unit.unit }}
                </p>
              </div>
              <div class="col-2">
                <p id="cartItem1Price">${{ product.price }}</p>
              </div>
              <hr />
            </div>
            <!--2-->
            <!-- <div class="cartItem row align-items-start">
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
                <p class="cartItemQuantity p-1 text-center">1</p>
              </div>
              <div class="col-2">
                <p id="cartItem1Price">$66</p>
              </div>
            </div> -->
            <hr />
          </div>
          <div class="col-12 col-sm-4 p-3 proceed form">
            <div class="row m-0">
              <div class="col-sm-8 p-0">
                <h6>Subtotal</h6>
              </div>
              <div class="col-sm-4 p-0">
                <p id="subtotal" v-html="'$'+subTotal"></p>
              </div>
            </div>

            <div class="row m-0">
              <div class="col-sm-8 p-0">
                <h6>Disscount</h6>
              </div>
              <div class="col-sm-4 p-0">
                <p v-html="'$'+discount" ></p>
              </div>
            </div>
            <hr />
            <div class="row mx-0 mb-2">
              <div class="col-sm-8 p-0 d-inline">
                <h5>Total</h5>
              </div>
              <div class="col-sm-4 p-0">
                <p v-html="'$'+total">0</p>
              </div>
            </div>
            <form @submit.prevent="checkPromocodeUsage">
              <div style="display: flex">
                <input
                  class="btn btn-outline-dark"
                  type="text"
                  placeholder="promocode"
                  v-model="code"
                  name="promocode"
                  required
                />
                <button
                  type="submit"
                  class="btn btn-outline-dark"
                  :style="{ minWidth: '50px', marginBottom: '3px' }"
                >
                  -->
                </button>
               
                           </div>
                           <p style="color:red" class="help is-danger" v-show="status" v-text="status"></p> 
            </form>

            <a class="btn btn-outline-dark" href="/cart"> Check out </a>
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
      code: null,
      subTotal:0,
      discount:0,
      total:0,
    };
  },
  props: ["products"],
  data(){
    return{
      status: false,
    };
  },
  methods: {
    getSubTotal() {
      console.log("subtotal", this.products);
      //   this.products.foreach(product=>{
      //       console.log(product.price);
      //   })
      var sum = 0;
      for (const product in this.products) {
        sum += this.products[product].price;
      }
      this.subTotal = sum
      this.total = sum
    },
    submitForm(e) {},
    checkPromocodeUsage() {
      const self = this;
      //   console.log(this.code);
      const Obj = {
        code: this.code,
      };
      axios
        .post("/checkPromocodeUsage", Obj)
        .then((res) => {
          // self.code = res.response.data;
            this.discount =  (this.subTotal * (res.data.discount_amount/100))
            this.total = this.subTotal - this.discount
          // this.form.reset();
        })
        .catch(function (error) {
          // self.code = error.response.data;
              self.status = error.response.data;
        });
    },
  },
  mounted() {
    this.getSubTotal();
  },
};
</script>
<style scoped></style>


