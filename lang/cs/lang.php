<?php

return [
    'fields' => [
        'account_number' => 'Číslo účtu',
        'active' => 'Aktivní',
        'address' => 'Adresa',
        'attributes' => 'Vlastnosti',
        'bank' => 'Banka',
        'billing_address' => 'Fakturační adresa',
        'brand' => 'Výrobce',
        'categories' => 'Kategorie',
        'change_stock' => 'Upravit stav zásob',
        'city' => 'Město',
        'color' => 'barva',
        'company_name' => 'Název společnosti',
        'country' => 'Stát',
        'created_at' => 'Vytvořeno',
        'currencySymbol' => 'Symbol měny',
        'customer' => 'Zákazník',
        'decimal_symbol' => 'Oddělovač pro desetinné místa',
        'decomposite_on' => 'Rozkládat podle',
        'decreases_stock' => 'Snižuje stav zásob',
        'delivery_address' => 'Doručovací adresa',
        'delivery_option' => 'Doprava',
        'dic' => 'DIČ',
        'download' => 'Stáhnout',
        'first_name' => 'Jméno',
        'has_variants' => 'Má varianty',
        'ic' => 'IČ',
        'ic_dph' => 'IČ DPH',
        'ico' => 'IČO',
        'images' => 'Obrázky',
        'in_stock' => 'Skladem',
        'invoices' => 'Faktury',
        'invoices_log' => 'Historie vygenerovaných faktur',
        'is_canceled' => 'Znamená stornování objednávky',
        'last_name' => 'Příjmení',
        'log' => 'Log',
        'long_description' => 'Dlouhý popis',
        'name' => 'Název',
        'normal_invoice' => 'Běžná faktura',
        'notes' => 'Poznámky',
        'order_status' => 'Stav objednávky',
        'parent' => 'Nadřazená kategorie',
        'payment_method' => 'Způsob platby',
        'payment_status' => 'Stav platby',
        'personal_collection' => 'Osobní předání',
        'price' => 'Cena',
        'product' => 'Produkt',
        'product_price' => 'Výchozí cena produktu',
        'products' => 'Produkty',
        'quantity' => 'Množství',
        'rate' => 'Sazba',
        'refunded_quantity' => 'Z toho vráceno',
        'retail_price' => 'Základní cena',
        'shipping_time' => 'Doručovací doba',
        'short_description' => 'Krátký popis',
        'specifications' => 'Obecné specifikace',
        'status' => 'Status',
        'tax' => 'Daň',
        'tax_size' => 'Výše daně (%)',
        'title' => 'Titulek',
        'type' => 'Typ',
        'updated_at' => 'Upraveno',
        'user' => 'Uživatel',
        'value' => 'Hodnota',
        'variant_specifications' => 'Specifikace pro tuto variantu',
        'variants_and_attributes' => 'Varianty a jejich vlastnosti',
        'variants_handling' => 'Správa variant',
        'visible' => 'Viditělný',
        'zip' => 'PSČ',
        'eshop_email' => 'eShop email'

    ],
    'buttons' => [
        'refund' => 'Vrátit zboží',
        'create_and_close' => 'Vytvořit a zavřít',
        'create' => 'Vytvořit',
        'cancel' => 'Zrušit',
        'save' => 'Uložit',
        'save_and_close' => 'Uložit a zavřít',
        'update' => 'Upravit',
        'done' => 'Hotovo'
    ],
    'tabs' => [
        'descriptions' => 'Popis',
        'details' => 'Detaily',
        'images' => 'Obrázky',
        'info' => 'Základní informace',
        'invoices' => 'Faktury',
        'notes' => 'Poznámky',
        'presentation_rules' => 'Pravidla pro zobrazování',
        'products' => 'Produkty',
        'rules' => 'Pravidla',
        'basics' => 'Základy',
        'eshop' => 'eShop',
    ],
    'comments' => [
        'orderstatus' => [
            'decreases_stock' => 'Ponechte neoznačený, pokud tento status znamená, že objednávka nesnižuje stav zásob.',
            'is_canceled' => 'Tento status značí, že je objednávka stornována. Zboží se připočte zpět do skladu a nově generované faktury budou obsahovat informaci o stornování.',
        ],
        'order' => [
            'price_empty' => 'Toto pole ponechte prázdné pokud si přejet použít katalogovou cenu.',
        ]
    ],
    'menu' => [
        'addresses' => 'Adresy',
        'brands' => 'Výrobci',
        'categories' => 'Kategorie',
        'delivery_options' => 'Způsoby doručení',
        'order_statuses' => 'Stavy objednávky',
        'orders' => 'Objednávky',
        'payment_methods' => 'Způsoby platby',
        'products' => 'Produkty',
        'users' => 'Uživatelé',
    ],
    'placeholders' => [
        'change_stock' => 'Zde můžete změnit stav zásob o zadané číslo (+/-)',
        'use_products_price' => 'Použít výchozí cenu produktu',
    ],
    'orderstatus' => [
        'canceled' => 'Stornováno',
        'finished' => 'Vyřízeno',
        'new' => 'Nová',
        'ready_for_collection' => 'Připraveno k vyzvednutí',
        'shipped' => 'Expedováno',
    ],
    'orderlog' => [
        'canceled' => 'Objednávka byla stornována',
        'created' => 'Objednávka vytvořena',
        'finished' => 'Objednávka dokončena',
        'paid' => 'Objednávka byla zaplacena',
        'ready' => 'Objednávka je připravena na vyzvednutí',
        'shipped' => 'Objednávka byla expedována',
    ],
    'payment_status' => [
        'awaiting_payment' => 'Čeká na platbu',
        'cash_on_delivery' => 'Platba na dobírku',
        'paid' => 'Zaplaceno',
    ],
    'other' => [
        'add_pictures_to_variants' => 'Přidat obrázky k variantám',
        'and_variants_to_add_them_to' => 'a varianty ke kterým je přiřadit',
        'cancel' => 'Zrušit',
        'cancel_invoice' => 'Stornovací faktura',
        'change_status' => 'Změna statusu',
        'confirm' => 'Potvrdit',
        'continue' => 'Pokračovat',
        'edit' => 'Upravit',
        'image_remove' => 'Obrázek odebrán',
        'new_category' => 'Nová kategorie',
        'normal_invoice' => 'Běžná faktura',
        'other_pictures' => 'Ostatní obrázky',
        'pair_these' => 'Spárovat vybrané / Potvrdit',
        'pictures_added' => 'Obrázky přidány',
        'primary_picture' => 'Titulní obrázek',
        'reorder' => 'Změnit uspořádání',
        'return' => 'Vrátit se',
        'saved_primary_picutres' => 'Primární obrázky přiřazeny',
        'select_pictures' => 'Vyberte obrázky',
        'select_primary_pictures' => 'Vybrat titulní obrázek',
        'addresses' => 'Adresy',
        'brands' => 'Značky',
        'categories' => 'Kategorie',
        'orders' => 'Objednávky',
        'products' => 'Produkty',
        'product_variants' => 'Varianty produktů',
    ],
    'toolbar' => [
        'new_address' => 'Nová adresa',
        'new_brand' => 'Nový výrobce',
        'new_category' => 'Nová kategorie',
        'new_order' => 'Nová objednávka',
        'new_product' => 'Nový produkt',
        'reorder' => 'Změnit uspořádání',
    ]
];