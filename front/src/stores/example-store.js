import { defineStore } from 'pinia';

export const useCounterStore = defineStore('counter', {
  state: () => ({
    counter: 0,
    cart: [],
    favorites: [],
    products: [],
  }),
  getters: {
    doubleCount: (state) => state.counter * 2,
  },
  actions: {
    addProduct(product) {
       // preguntar si item existe si no exists eoclocar en un arary  y si existe aumentar al array
      const productIndex = this.cart.findIndex((item) => item.id === product.id);
      if (productIndex === -1) {
        product.items = [product.item];
        this.cart.push(product);
      }else{
        this.cart[productIndex].items.push(product.item);
        this.cart[productIndex].cantidad += product.cantidad;
      }
      localStorage.setItem('cart', JSON.stringify(this.cart));
    },
    increment() {
      this.counter++;
    },
  },
});
