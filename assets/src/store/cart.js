/* eslint-disable no-param-reassign */

import Vue from 'vue';
import { priceWithoutTax } from '@/helpers';

export default {
  state: {
    items: [],
  },
  actions: {
    ADD_TO_CART({ commit, getters, state }, item) {
      const existingItemIndex = getters.getItemIndexFromCart(item.product.slug);

      if (existingItemIndex !== -1) {
        const existingItem = state.items[existingItemIndex];
        existingItem.amount += item.amount;
        commit('UPDATE_ITEM', {
          index: existingItemIndex,
          updatedItem: existingItem,
        });
        return;
      }

      commit('ADD_TO_CART', item);
    },
    CHANGE_ITEM_AMOUNT({ commit, getters, state }, { slug, newAmount }) {
      const index = getters.getItemIndexFromCart(slug);
      if (index !== -1) {
        commit('UPDATE_ITEM_AMOUNT', {
          index,
          newAmount,
        });
      }
    },
    REMOVE_ITEM({ commit, getters }, slug) {
      const index = getters.getItemIndexFromCart(slug);
      if (index !== -1) {
        commit('REMOVE_ITEM', index);
      }
    },
  },
  mutations: {
    ADD_TO_CART(state, item) {
      state.items.push(item);
    },
    UPDATE_ITEM(state, { index, updatedItem }) {
      Vue.set(state.items, index, updatedItem);
    },
    UPDATE_ITEM_AMOUNT(state, { index, newAmount }) {
      state.items[index].amount = newAmount;
    },
    REMOVE_ITEM(state, index) {
      state.items.splice(index, 1);
    },
    CLEAN_CART(state) {
      state.items = [];
    },
  },
  getters: {
    getItemFromCart: state => slug => state.items.find(item => item.product.slug === slug),
    getItemIndexFromCart: state =>
      slug => state.items.findIndex(
        item => item.product.slug === slug),
    getCartLength: state => state.items.length,
    getCartItems: state => state.items,
    getCartSum: (state) => {
      let sumWithTax = 0;
      let sumWithoutTax = 0;

      state.items.forEach((item) => {
        sumWithTax += (item.amount * item.product.price);
        sumWithoutTax += parseFloat(
          priceWithoutTax(
            item.product.price * item.amount, item.product.tax_rate));
      });
      return {
        withoutTax: sumWithoutTax.toFixed(2),
        withTax: sumWithTax.toFixed(2),
      };
    },
  },
};
