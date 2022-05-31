<template>
  <div class="container px-4 px-lg-5 mt-5">
    <div
      class="
        row
        gx-4 gx-lg-5
        row-cols-2 row-cols-md-3 row-cols-xl-4
        justify-content-center
      "
    >
      <div v-for="(item, index) in products" :key="index" class="col mb-5" @click="openProduct">

        <a class="card h-100" >
          <!-- Product image-->
          <img class="card-img-top" :src="'/images/siteImages/02.jpg'" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">

              <h5 class="fw-bolder">{{item.product_name}}</h5>
              <!-- Product price-->
              ${{item.price }}/ {{item.unit.unit}}
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" @click="addToCart(index)">Add To Cart</a>
            </div>
          </div>
        </a>
      </div>
     <!-- <div class="col mb-5">
        <a class="card h-100" href="/products/asdfasdf">
          
          <div
            class="badge bg-dark text-white position-absolute"
            style="top: 0.5rem; right: 0.5rem"
          >
            Sale
          </div>
          
          <img class="card-img-top" :src="'/images/siteImages/01.jpg'" alt="..." />
         
          <div class="card-body p-4">
            <div class="text-center">
              
              <h5 class="fw-bolder">Special Item</h5>
              
              <div
                class="d-flex justify-content-center small text-warning mb-2"
              >
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              <span class="text-muted text-decoration-line-through"
                >$20.00</span
              >
              $18.00
            </div>
          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
            </div>
          </div>
        </a>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <div
            class="badge bg-dark text-white position-absolute"
            style="top: 0.5rem; right: 0.5rem"
          >
            Sale
          </div>
          <img class="card-img-top" :src="'/images/siteImages/03.jpg'" alt="..." />
          <div class="card-body p-4">
            <div class="text-center">
              <h5 class="fw-bolder">Sale Item</h5>
              <span class="text-muted text-decoration-line-through"
                >$50.00</span
              >
              $25.00
            </div>
          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <img class="card-img-top" :src="'/images/siteImages/04.jpg'" alt="..." />
          <div class="card-body p-4">
            <div class="text-center">
              <h5 class="fw-bolder">Popular Item</h5>
              <div
                class="d-flex justify-content-center small text-warning mb-2"
              >
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              $40.00
            </div>
          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <div
            class="badge bg-dark text-white position-absolute"
            style="top: 0.5rem; right: 0.5rem"
          >
            Sale
          </div>
          <img class="card-img-top" :src="'/images/siteImages/05.jpg'" alt="..." />
          <div class="card-body p-4">
            <div class="text-center">
              <h5 class="fw-bolder">Sale Item</h5>
              <span class="text-muted text-decoration-line-through"
                >$50.00</span
              >
              $25.00
            </div>
          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <img class="card-img-top" :src="'/images/siteImages/06.jpg'" alt="..." />
          <div class="card-body p-4">
            <div class="text-center">

              <h5 class="fw-bolder">Fancy Product</h5>
              $120.00 - $280.00
            </div>
          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" href="#">View options</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <div
            class="badge bg-dark text-white position-absolute"
            style="top: 0.5rem; right: 0.5rem"
          >
            Sale
          </div>
          <img class="card-img-top" :src="'/images/siteImages/07.jpg'" alt="..." />
          <div class="card-body p-4">
            <div class="text-center">

              <h5 class="fw-bolder">Special Item</h5>
              <div
                class="d-flex justify-content-center small text-warning mb-2"
              >
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              <span class="text-muted text-decoration-line-through"
                >$20.00</span
              >
              $18.00
            </div>
          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <img class="card-img-top" :src="'/images/siteImages/08.jpg'" alt="..." />
          <div class="card-body p-4">
            <div class="text-center">

              <h5 class="fw-bolder">Popular Item</h5>
              <div
                class="d-flex justify-content-center small text-warning mb-2"
              >
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              $40.00
            </div>
          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
            </div>
           </div> 
        </div>
      </div>-->
    </div>
  </div>
</template>

<script>
  export default {
    // props: ['paymentData'],
    // emits: ['clearPaymentData'],
    data: () => ({}),
    props: ['products'],
    methods: {
      openProduct() {
        console.log("xxxxxxxxxxxxxx");
          axios
              .get("/products/product-name")
              .then((response) => (this.info = response));
      },
      addToCart(i){
        console.log(this.products[i]);
        axios
              .post("/product/add-to-cart",this.products[i])
              .then((response) => (this.info = response));
      }
    },
    mounted() {
      console.log(this.products)
    },
  };

  // href="/products/asdfasdf"
</script>

<style scoped>
</style>

