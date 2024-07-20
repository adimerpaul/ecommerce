<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        //            productos: [
//{
//    idProducto: 46,
//descripcion: "Sigue evolucionando en velocidad con un calzado de carrera hecho para ayudarte a alcanzar nuevos objetivos y récords. Mejora la comodidad y la transpirabilidad con una parte superior rediseñada. Ya sea en una carrera de 10 km o en un maratón, este modelo, al igual que su versión anterior,
//
//",
//titulo: "Nike Vaporfly NEXT",
//precio: 13,
//categoria: "Zapatillas",
//subcategoria: "Deportivas",
//masVendido: "si",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/CU4111_301_A_PREM.jpg",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/CU4111_301_E_PREM.jpg",
//imagen3: "https://indumentaria.faugetdigital.shop/./imagenes_productos/CU4111_301_F_PREM.jpg",
//imagen4: "https://indumentaria.faugetdigital.shop/./imagenes_productos/457057-800-800.webp",
//item1: "",
//item2: "",
//item3: "",
//item4: "",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 300000,
//stock: 80,
//createdAt: "2024-05-28 23:17:40"
//},
//{
//    idProducto: 47,
//descripcion: "Vístete con nuestra remera absorbente de sudor y deja que la sensación suave y el ajuste relajado te ayudan a superar los entrenamientos de todo tipo. Tu plan de condición física es muy variado, por lo que hicimos una remera lo suficientemente cómoda para lo que quieras hacer, ya sea una carrera rápida, repeticiones en el gimnasio o encontrar tu zen en el tapete de yoga.",
//titulo: "Remera de Entrenamiento para Hombre",
//precio: 29299,
//categoria: "Remeras",
//subcategoria: "Entrenamientos ",
//masVendido: "si",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/533449-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/544600-800-800.webp",
//imagen3: "https://indumentaria.faugetdigital.shop/./imagenes_productos/550679-800-800.webp",
//imagen4: "",
//item1: "S",
//item2: "M",
//item3: "X",
//item4: "XL",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 40000,
//stock: 14,
//createdAt: "2024-05-28 23:19:21"
//},
//{
//    idProducto: 48,
//descripcion: "Quizás te encante el look clásico de los 90, pero también te apasione la cultura acelerada de hoy. Te presentamos el Air Max TW. Inspirado en la preciada franquicia que trajo la amortiguación Nike Air al mundo y estableció las bases para la estética de atletismo urbano, su diseño llamativo ofrece un toque potente de comodidad y moda. Lista para resaltar cualquier ajuste, su parte superior ligera combina líneas angulares y orgánicas para crear un efecto háptico fascinante. Las combinaciones de colores contrastantes facilitan el estilo. ",
//titulo: "Nike Air Max TW",
//precio: 30000,
//categoria: "Zapatillas",
//subcategoria: "Trail running",
//masVendido: "si",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/453667-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/464662-800-800.webp",
//imagen3: "",
//imagen4: "",
//item1: "S",
//item2: "M",
//item3: "X",
//item4: "XL",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 50000,
//stock: 90,
//createdAt: "2024-05-28 23:20:46"
//},
//{
//    idProducto: 49,
//descripcion: "SIGUE CORRIENDO CON UN SOPORTE SUAVE Y ESTABLE. Aún nuestro calzado más probado, hecho para ayudarte a lograr tus ambiciosos objetivos de running. El Nike React Infinity Run 3 se siente cómodo y estable con una pisada suave que te lleva por rutas largas y cortas. La parte superior transpirable está diseñada para brindar contención y, a la vez, flexibilidad.
//
//",
//titulo: "Nike React Infinity Run Flyknit 3",
//precio: 34000,
//categoria: "Zapatillas",
//subcategoria: "Entrenamiento ",
//masVendido: "no",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/699322-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/699855-800-800.webp",
//imagen3: "",
//imagen4: "",
//item1: "M",
//item2: "L",
//item3: "X",
//item4: "",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 60000,
//stock: 56,
//createdAt: "2024-05-28 23:21:44"
//},
//{
//    idProducto: 50,
//descripcion: "No puedes dejar de lucir fresco en un Low que fusiona la artesanía de alta calidad con características de tecnología avanzada. La tela ripstop ventilada y la gamuza sintética suave se combinan con un interior suave. ¿El resultado? El look low clásico y la comodidad premium que esperas de la marca Jordan. Beneficios •Confeccionada con gamuza sintética duradera y tela ripstop, la parte superior es ligera y cómoda. •La suela de goma ofrece una tracción amplia. •El interior suave evita las abrasiones.
//
//",
//titulo: "Jordan Delta 3 Low",
//precio: 34000,
//categoria: "Zapatillas",
//subcategoria: "Casuales ",
//masVendido: "si",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/700151-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/700854-800-800.webp",
//imagen3: "https://indumentaria.faugetdigital.shop/./imagenes_productos/700853-800-800.webp",
//imagen4: "",
//item1: "M",
//item2: "L",
//item3: "",
//item4: "",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 60000,
//stock: 90,
//createdAt: "2024-05-28 23:22:53"
//},
//{
//    idProducto: 51,
//descripcion: "COMODIDAD Y APOYO INTUITIVOS. Este' s para los corredores que alcanzan sus objetivos personales todos los días. El Nike Zoom Span 4 tiene un ajuste duradero con amortiguación lujosa para combinar con la sensación de apoyo. Tiene el aspecto de un clásico, además de puntos de contacto intuitivos que se sienten bien cuando te pones y te quitas los zapatos.",
//titulo: "Nike Miler Remera de Running para Hombre",
//precio: 25799,
//categoria: "Remeras",
//subcategoria: "Trail running",
//masVendido: "si",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/648025-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/649556-800-800.webp",
//imagen3: "https://indumentaria.faugetdigital.shop/./imagenes_productos/651084-800-800.webp",
//imagen4: "",
//item1: "S",
//item2: "L",
//item3: "X",
//item4: "",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 50000,
//stock: 12,
//createdAt: "2024-05-28 23:25:32"
//},
//{
//    idProducto: 52,
//descripcion: "LIGEREZA, FLEXIBILIDAD Y COMODIDAD. La remera Nike Dri-FIT Superset ofrece suavidad y elimina las restricciones al empujar, tirar y levantar gracias a un diseño que reubica las costuras de los hombros para que no estorben. La tela transpirable ayuda a mantener la frescura.",
//titulo: "Nike Dri-FIT Superset",
//precio: 25799,
//categoria: "Remeras",
//subcategoria: "Entrenamiento ",
//masVendido: "si",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/211704-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/216194-800-800.webp",
//imagen3: "https://indumentaria.faugetdigital.shop/./imagenes_productos/220628-800-800.webp",
//imagen4: "",
//item1: "S",
//item2: "M",
//item3: "X",
//item4: "XL",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 449999,
//stock: 12,
//createdAt: "2024-05-28 23:27:08"
//},
//{
//    idProducto: 53,
//descripcion: "Celebra el poder y la simplicidad del Swoosh. Estos pants de tejido Fleece suave y cepillado están hechos para brindar comodidad y un estilo relajado y nostálgico. Son amplios en la parte posterior y los muslos, y ligeramente cónicos hasta el tobillo con puño.",
//titulo: "Nike Solo Swoosh",
//precio: 71999,
//categoria: "Pantalones",
//subcategoria: "Deportivas",
//masVendido: "si",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/533874-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/575645-800-800.webp",
//imagen3: "",
//imagen4: "",
//item1: "M",
//item2: "L",
//item3: "X",
//item4: "XL",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 890000,
//stock: 56,
//createdAt: "2024-05-28 23:29:59"
//},
//{
//    idProducto: 54,
//descripcion: "Tus entrenamientos no se detienen cuando comienza el clima frío, así que agregamos tejido Fleece supersuave a nuestros pants Therma-FIT. Diseñados para mantenerte abrigado y cómodo dondequiera que realices ejercicio, su ajuste relajado y entallado brinda mucho espacio para estirarse y hacer sentadillas sin perder ningún rango de movimiento. ",
//titulo: "Nike Therma-FIT",
//precio: 45299,
//categoria: "Pantalones",
//subcategoria: "Entrenamiento ",
//masVendido: "si",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/238544-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/238907-800-800.webp",
//imagen3: "https://indumentaria.faugetdigital.shop/./imagenes_productos/240276-800-800.webp",
//imagen4: "",
//item1: "",
//item2: "",
//item3: "",
//item4: "",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 0,
//stock: 45,
//createdAt: "2024-05-28 23:31:20"
//},
//{
//    idProducto: 55,
//descripcion: "Cuando entrenas, estos shorts absorbentes de sudor ayudan a bajar la temperatura con una sensación fresca y transpirable. Las aberturas de ventilación agregan flexibilidad adicional en cada pisada para sacar el máximo partido a tus movimientos. ",
//titulo: "Nike Dri-FIT",
//precio: 120000,
//categoria: "Pantalones",
//subcategoria: "Trail running",
//masVendido: "no",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/212536-800-800.webp",
//imagen2: "https://indumentaria.faugetdigital.shop/./imagenes_productos/225811-800-800.webp",
//imagen3: "",
//imagen4: "",
//item1: "S",
//item2: "L",
//item3: "",
//item4: "",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 560000,
//stock: 12,
//createdAt: "2024-05-28 23:32:29"
//},
//{
//    idProducto: 57,
//descripcion: "GORRA MASCULINO",
//titulo: "GORRA NIKE",
//precio: 1500000,
//categoria: "OTRO",
//subcategoria: "Deportivas",
//masVendido: "no",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/GORRO.jpg",
//imagen2: "",
//imagen3: "",
//imagen4: "",
//item1: "",
//item2: "",
//item3: "",
//item4: "",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 1100000,
//stock: 10,
//createdAt: "2024-05-31 20:57:49"
//},
//{
//    idProducto: 60,
//descripcion: "PIJAMA",
//titulo: "PIJAMA",
//precio: 10,
//categoria: "PIJAMAS",
//subcategoria: "Invierno",
//masVendido: "no",
//imagen1: "https://indumentaria.faugetdigital.shop/./imagenes_productos/cinturon-negro.png",
//imagen2: "",
//imagen3: "",
//imagen4: "",
//item1: "XS",
//item2: "S",
//item3: "M",
//item4: "L",
//item5: "",
//item6: "",
//item7: "",
//item8: "",
//item9: "",
//item10: "",
//precioAnterior: 15,
//stock: 10,
//createdAt: "2024-07-08 03:27:58"
//}
//]
//}

//        Category::create(['name'=>'Zapatillas']);
//        Category::create(['name'=>'Remeras']);
//        Category::create(['name'=>'Pantalones']);
//        SubCategory::create(['name'=>'Deportivas']);
//        SubCategory::create(['name'=>'Entrenamientos']);
//        SubCategory::create(['name'=>'Trail running']);
//        SubCategory::create(['name'=>'Casuales']);


//        $table->string('descripcion')->nullable();
//        $table->string('titulo')->nullable();
//        $table->integer('precio')->nullable();
//        $table->string('masVendido')->nullable();
//        $table->string('imagen1')->nullable();
//        $table->string('imagen2')->nullable();
//        $table->string('imagen3')->nullable();
//        $table->string('imagen4')->nullable();
//        $table->string('item1')->nullable();
//        $table->string('item2')->nullable();
//        $table->string('item3')->nullable();
//        $table->string('item4')->nullable();
//        $table->string('item5')->nullable();
//        $table->string('item6')->nullable();
//        $table->string('item7')->nullable();
//        $table->string('item8')->nullable();
//        $table->string('item9')->nullable();
//        $table->string('item10')->nullable();
//        $table->integer('precioAnterior')->nullable();
//        $table->integer('stock')->nullable();
//        $table->unsignedBigInteger('category_id');
//        $table->foreign('category_id')->references('id')->on('categories');
//        $table->unsignedBigInteger('sub_category_id');


//        Category::create(['name'=>'Zapatillas']);
//        Category::create(['name'=>'Remeras']);
//        Category::create(['name'=>'Pantalones']);
//        SubCategory::create(['name'=>'Deportivas']);
//        SubCategory::create(['name'=>'Entrenamientos']);
//        SubCategory::create(['name'=>'Trail running']);
//        SubCategory::create(['name'=>'Casuales']);

        Product::create([
            'descripcion' => 'Sigue evolucionando en velocidad con un calzado de carrera hecho para ayudarte a alcanzar nuevos objetivos y récords. Mejora la comodidad y la transpirabilidad con una parte superior rediseñada. Ya sea en una carrera de 10 km o en un maratón, este modelo, al igual que su versión anterior',
            'titulo' => 'Nike Vaporfly NEXT',
            'precio' => 13,
            'masVendido' => 'si',
            'imagen1' => 'CU4111_301_A_PREM.jpg',
            'imagen2' => 'CU4111_301_E_PREM.jpg',
            'imagen3' => 'CU4111_301_F_PREM.jpg',
            'imagen4' => '457057-800-800.webp',
            'item1' => '',
            'item2' => '',
            'item3' => '',
            'item4' => '',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 300000,
            'stock' => 80,
            'category_id' => 1,
            'sub_category_id' => 1
        ]);
        Product::create([
            'descripcion' => 'Vístete con nuestra remera absorbente de sudor y deja que la sensación suave y el ajuste relajado te ayudan a superar los entrenamientos de todo tipo. Tu plan de condición física es muy variado, por lo que hicimos una remera lo suficientemente cómoda para lo que quieras hacer, ya sea una carrera rápida, repeticiones en el gimnasio o encontrar tu zen en el tapete de yoga.',
            'titulo' => 'Remera de Entrenamiento para Hombre',
            'precio' => 29299,
            'masVendido' => 'si',
            'imagen1' => '533449-800-800.webp',
            'imagen2' => '544600-800-800.webp',
            'imagen3' => '550679-800-800.webp',
            'item1' => 'S',
            'item2' => 'M',
            'item3' => 'X',
            'item4' => 'XL',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 40000,
            'stock' => 14,
            'category_id' => 2,
            'sub_category_id' => 2
        ]);
        Product::create([
            'descripcion' => 'Quizás te encante el look clásico de los 90, pero también te apasione la cultura acelerada de hoy. Te presentamos el Air Max TW. Inspirado en la preciada franquicia que trajo la amortiguación Nike Air al mundo y estableció las bases para la estética de atletismo urbano, su diseño llamativo ofrece un toque potente de comodidad y moda. Lista para resaltar cualquier ajuste, su parte superior ligera combina líneas angulares y orgánicas para crear un efecto háptico fascinante. Las combinaciones de colores contrastantes facilitan el estilo.',
            'titulo' => 'Nike Air Max TW',
            'precio' => 30000,
            'masVendido' => 'si',
            'imagen1' => '453667-800-800.webp',
            'imagen2' => '464662-800-800.webp',
            'imagen3' => '',
            'item1' => 'S',
            'item2' => 'M',
            'item3' => 'X',
            'item4' => 'XL',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 50000,
            'stock' => 90,
            'category_id' => 1,
            'sub_category_id' => 3
        ]);
        Product::create([
            'descripcion' => 'SIGUE CORRIENDO CON UN SOPORTE SUAVE Y ESTABLE. Aún nuestro calzado más probado, hecho para ayudarte a lograr tus ambiciosos objetivos de running. El Nike React Infinity Run 3 se siente cómodo y estable con una pisada suave que te lleva por rutas largas y cortas. La parte superior transpirable está diseñada para brindar contención y, a la vez, flexibilidad.',
            'titulo' => 'Nike React Infinity Run Flyknit 3',
            'precio' => 34000,
            'masVendido' => 'no',
            'imagen1' => '699322-800-800.webp',
            'imagen2' => '699855-800-800.webp',
            'imagen3' => '',
            'item1' => 'M',
            'item2' => 'L',
            'item3' => 'X',
            'item4' => '',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 60000,
            'stock' => 56,
            'category_id' => 1,
            'sub_category_id' => 2
        ]);
        Product::create([
            'descripcion' => 'No puedes dejar de lucir fresco en un Low que fusiona la artesanía de alta calidad con características de tecnología avanzada. La tela ripstop ventilada y la gamuza sintética suave se combinan con un interior suave. ¿El resultado? El look low clásico y la comodidad premium que esperas de la marca Jordan. Beneficios •Confeccionada con gamuza sintética duradera y tela ripstop, la parte superior es ligera y cómoda. •La suela de goma ofrece una tracción amplia. •El interior suave evita las abrasiones.',
            'titulo' => 'Jordan Delta 3 Low',
            'precio' => 34000,
            'masVendido' => 'si',
            'imagen1' => '700151-800-800.webp',
            'imagen2' => '700854-800-800.webp',
            'imagen3' => '700853-800-800.webp',
            'item1' => 'M',
            'item2' => 'L',
            'item3' => '',
            'item4' => '',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 60000,
            'stock' => 90,
            'category_id' => 1,
            'sub_category_id' => 4
        ]);
        Product::create([
            'descripcion' => 'COMODIDAD Y APOYO INTUITIVOS. Este\' s para los corredores que alcanzan sus objetivos personales todos los días. El Nike Zoom Span 4 tiene un ajuste duradero con amortiguación lujosa para combinar con la sensación de apoyo. Tiene el aspecto de un clásico, además de puntos de contacto intuitivos que se sienten bien cuando te pones y te quitas los zapatos.',
            'titulo' => 'Nike Miler Remera de Running para Hombre',
            'precio' => 25799,
            'masVendido' => 'si',
            'imagen1' => '648025-800-800.webp',
            'imagen2' => '649556-800-800.webp',
            'imagen3' => '651084-800-800.webp',
            'item1' => 'S',
            'item2' => 'L',
            'item3' => 'X',
            'item4' => '',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 50000,
            'stock' => 12,
            'category_id' => 2,
            'sub_category_id' => 3
        ]);
        Product::create([
            'descripcion' => 'LIGEREZA, FLEXIBILIDAD Y COMODIDAD. La remera Nike Dri-FIT Superset ofrece suavidad y elimina las restricciones al empujar, tirar y levantar gracias a un diseño que reubica las costuras de los hombros para que no estorben. La tela transpirable ayuda a mantener la frescura.',
            'titulo' => 'Nike Dri-FIT Superset',
            'precio' => 25799,
            'masVendido' => 'si',
            'imagen1' => '211704-800-800.webp',
            'imagen2' => '216194-800-800.webp',
            'imagen3' => '220628-800-800.webp',
            'item1' => 'S',
            'item2' => 'M',
            'item3' => 'X',
            'item4' => 'XL',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 449999,
            'stock' => 12,
            'category_id' => 2,
            'sub_category_id' => 2
        ]);
        Product::create([
            'descripcion' => 'Celebra el poder y la simplicidad del Swoosh. Estos pants de tejido Fleece suave y cepillado están hechos para brindar comodidad y un estilo relajado y nostálgico. Son amplios en la parte posterior y los muslos, y ligeramente cónicos hasta el tobillo con puño.',
            'titulo' => 'Nike Solo Swoosh',
            'precio' => 71999,
            'masVendido' => 'si',
            'imagen1' => '533874-800-800.webp',
            'imagen2' => '575645-800-800.webp',
            'imagen3' => '',
            'item1' => 'M',
            'item2' => 'L',
            'item3' => 'X',
            'item4' => 'XL',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 890000,
            'stock' => 56,
            'category_id' => 3,
            'sub_category_id' => 1
        ]);
        Product::create([
            'descripcion' => 'Tus entrenamientos no se detienen cuando comienza el clima frío, así que agregamos tejido Fleece supersuave a nuestros pants Therma-FIT. Diseñados para mantenerte abrigado y cómodo dondequiera que realices ejercicio, su ajuste relajado y entallado brinda mucho espacio para estirarse y hacer sentadillas sin perder ningún rango de movimiento.',
            'titulo' => 'Nike Therma-FIT',
            'precio' => 45299,
            'masVendido' => 'si',
            'imagen1' => '238544-800-800.webp',
            'imagen2' => '238907-800-800.webp',
            'imagen3' => '240276-800-800.webp',
            'item1' => '',
            'item2' => '',
            'item3' => '',
            'item4' => '',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 0,
            'stock' => 45,
            'category_id' => 3,
            'sub_category_id' => 2
        ]);
        Product::create([
            'descripcion' => 'Cuando entrenas, estos shorts absorbentes de sudor ayudan a bajar la temperatura con una sensación fresca y transpirable. Las aberturas de ventilación agregan flexibilidad adicional en cada pisada para sacar el máximo partido a tus movimientos.',
            'titulo' => 'Nike Dri-FIT',
            'precio' => 120000,
            'masVendido' => 'no',
            'imagen1' => '212536-800-800.webp',
            'imagen2' => '225811-800-800.webp',
            'imagen3' => '',
            'item1' => 'S',
            'item2' => 'L',
            'item3' => '',
            'item4' => '',
            'item5' => '',
            'item6' => '',
            'item7' => '',
            'item8' => '',
            'item9' => '',
            'item10' => '',
            'precioAnterior' => 560000,
            'stock' => 12,
            'category_id' => 3,
            'sub_category_id' => 3
            ]);

    }
}
