export default {
  error: {
    api: 'Nastala chyba spojenia ({status}).',
  },
  sidebar: {
    orders: {
      title: 'História objednávok',
      titleDetail: 'Detail objednávky',
      noLogin: 'Pre históriu je potrebné sa prihlásiť',
      buttons: {
        cancel: 'Zrušiť',
        showMore: 'Zobraziť viac',
      },
      dialog: {
        cancel: 'Vážne chcete stornovat túto objednávku?',
      },
    },
    user: {
      title: 'Užívateľ',
      buttons: {
        login: 'Prihlásiť',
        logout: 'Odhlásiť',
        saveChanges: 'Uložiť zmeny',
      },
      form: {
        name: 'Meno',
        surname: 'Priezvisko',
      },
    },
    cart: {
      title: 'Košík',
      misc: {
        together: 'Spolu',
      },
      buttons: {
        order: 'Objednať',
      },
    },
  },
  pages: {
    detail: {
      buttons: {
        addToCart: 'Pridať do košíka',
      },
      misc: {
        inBasket: 'V košíku',
        name: 'Názov',
        value: 'Hodnota',
      },
    },
    main: {
      misc: {
        bestSellers: 'Najpredávanejšie produkty',
        newsetProducts: 'Najnovšie produkty',
      },
    },
  },
  other: {
    withDPH: 's DPH',
    withoutDPH: 'bez DPH',
    piece: 'ks',
  },
};
