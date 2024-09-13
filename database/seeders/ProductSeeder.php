<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = collect([
            [//1
                'name' => 'ONU Wolck 2.4',
                'price' => 25,
                'description' => 'ONU Wolck con soporte para 2.4 GHz. Ideal para conexiones de alta velocidad en entornos domésticos.',
                'brand_id' => 4,
                'categories' => [2, 6],
            ],
            [//2
                'name' => 'ONU HUAWEI SENCILLA',
                'price' => 15,
                'description' => 'ONU Huawei sencilla y económica, perfecta para aplicaciones de red básicas.',
                'brand_id' => 4,
                'categories' => [2, 6],
            ],
            [//3
                'name' => 'ONU CDATA SENCILLA CPON',
                'price' => 13,
                'description' => 'ONU CDATA con tecnología CPON para una conectividad eficiente y confiable.',
                'brand_id' => 14,
                'categories' => [2, 6],
            ],
            [//4
                'name' => 'TP-LINK LS1005G',
                'price' => 18,
                'description' => 'Switch TP-Link LS1005G de 5 puertos Gigabit, ideal para ampliar redes domésticas y de oficina.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//5
                'name' => 'DAHUA DH PFS3008 8 PUERTOS',
                'price' => 8.54,
                'description' => 'Switch Dahua de 8 puertos, compacto y eficiente, perfecto para pequeñas redes.',
                'brand_id' => 3,
                'categories' => [1],
            ],
            [//6
                'name' => 'DAHUA DH PFS3005 5 PUERTOS',
                'price' => 6.71,
                'description' => 'Switch Dahua de 5 puertos, ideal para extender redes en espacios reducidos.',
                'brand_id' => 3,
                'categories' => [1],
            ],
            [//7
                'name' => 'MERCUSYS MS105G 5 PUERTOS',
                'price' => 16,
                'description' => 'Switch Mercusys de 5 puertos Gigabit, diseñado para una conectividad rápida y estable.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//8
                'name' => 'MERCUSYS MS108 8 PUERTOS',
                'price' => 11,
                'description' => 'Switch Mercusys de 8 puertos, perfecto para redes pequeñas y medianas.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//9
                'name' => 'MERCUSYS MS105 5 PUERTOS',
                'price' => 11,
                'description' => 'Switch Mercusys de 5 puertos, una solución económica para ampliar su red.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//10
                'name' => 'TP-LINK LS105G 5 PUERTOS GB',
                'price' => 24,
                'description' => 'Switch TP-Link LS105G de 5 puertos Gigabit, ideal para conexiones de alta velocidad.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//11
                'name' => 'TP-LINK LS1008 8 PUERTOS 10/100M',
                'price' => 22,
                'description' => 'Switch TP-Link LS1008 con 8 puertos 10/100M, diseñado para expandir su red con facilidad.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//12
                'name' => 'MERCUSYS MS105G 5 PUERTOS 1GB',
                'price' => 16,
                'description' => 'Switch Mercusys de 5 puertos Gigabit, compacto y eficiente para redes domésticas.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//13
                'name' => 'TP-LINK LS1005G 5 PUERTOS GB',
                'price' => 18,
                'description' => 'Switch TP-Link LS1005G de 5 puertos Gigabit, ideal para hogares con múltiples dispositivos conectados.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//14
                'name' => 'TP-LINK LS1005G 5 PUERTOS GB',
                'price' => 18,
                'description' => 'Switch TP-Link LS1005G de 5 puertos Gigabit, ofrece una conexión de red rápida y fiable.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//15
                'name' => 'ONU CDATA 4 ANTENA DOBLE BANDA',
                'price' => 35,
                'description' => 'ONU CDATA con 4 antenas y doble banda para una cobertura de red ampliada.',
                'brand_id' => 4,
                'categories' => [1],
            ],
            [//16
                'name' => 'ONU CDATA 2,4',
                'price' => 26,
                'description' => 'ONU CDATA con soporte para 2,4 GHz, ideal para entornos domésticos.',
                'brand_id' => 4,
                'categories' => [1],
            ],
            [//17
                'name' => 'MERCUSYS EXTENSOR MR300RE',
                'price' => 21,
                'description' => 'Extensor de rango Mercusys MR300RE, mejora la cobertura WiFi en tu hogar.',
                'brand_id' => 2,
                'categories' => [7],
            ],
            [//18
                'name' => 'MERCUSYS EXTENSOR ME10',
                'price' => 20,
                'description' => 'Extensor de rango Mercusys ME10, fácil de instalar para una mejor conectividad.',
                'brand_id' => 2,
                'categories' => [7],
            ],
            [//19
                'name' => 'MERCUSYS MR305R',
                'price' => 18.50,
                'description' => 'Router Mercusys MR305R, compacto y eficiente para pequeñas redes domésticas.',
                'brand_id' => 2,
                'categories' => [1, 7],
            ],
            [//20
                'name' => 'MERCUSYS MR50G',
                'price' => 45,
                'description' => 'Router Mercusys MR50G, con tecnología de doble banda para una conexión rápida y estable.',
                'brand_id' => 2,
                'categories' => [1, 7],
            ],   
            [//21
                'name' => 'MERCUSYS AC12G',
                'price' => 37,
                'description' => 'Router Mercusys AC12G, ofrece conectividad estable con tecnología Gigabit y doble banda.',
                'brand_id' => 2,
                'categories' => [1, 7],
            ],
            [//22
                'name' => 'MERCUSYS MW330HP',
                'price' => 25,
                'description' => 'Router Mercusys MW330HP con alta potencia de señal para una cobertura WiFi amplia.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//23
                'name' => 'MERCUSYS MW306R',
                'price' => 19,
                'description' => 'Router Mercusys MW306R, una opción asequible para redes domésticas básicas.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//24
                'name' => 'MERCUSYS MW325R',
                'price' => 23,
                'description' => 'Router Mercusys MW325R, proporciona cobertura extendida y rendimiento estable.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//25
                'name' => 'MERCUSYS AC10',
                'price' => 27,
                'description' => 'Router Mercusys AC10, equipado con tecnología AC para una conexión rápida y eficiente.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//26
                'name' => 'MERCUSYS MR30G',
                'price' => 35,
                'description' => 'Router Mercusys MR30G, con tecnología de doble banda y puertos Gigabit para una conectividad rápida.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//27
                'name' => 'ROUTER MERCUSYS MW302R',
                'price' => 15,
                'description' => 'Router Mercusys MW302R, compacto y económico, ideal para pequeñas redes domésticas.',
                'brand_id' => 2, 
                'categories' => [1]
            ],
            [//28
                'name' => 'ROUTER MERCUSYS MW301R',
                'price' => 17,
                'description' => 'Router Mercusys MW301R, una solución sencilla para conectar dispositivos en el hogar.',
                'brand_id' => 2,
                'categories' => [1],
            ],
            [//29
                'name' => 'ROUTER TP-LINK TL-WR820N',
                'price' => 24,
                'description' => 'Router TP-Link TL-WR820N, ofrece conectividad estable y amplia cobertura en entornos domésticos.',
                'brand_id' => 1,
                'categories' => [1, 7],
            ],
            [//30
                'name' => 'ROUTER TP-LINK WR940N',
                'price' => 30,
                'description' => 'Router TP-Link WR940N, ideal para hogares con múltiples dispositivos y alta demanda de ancho de banda.',
                'brand_id' => 1,
                'categories' => [1, 7],
            ],
            [//31
                'name' => 'ROUTER TP-LINK WR841HP',
                'price' => 50,
                'description' => 'Router TP-Link WR841HP, con alta potencia de señal para cubrir grandes áreas.',
                'brand_id' => 1,
                'categories' => [1, 7],
            ],
            [//32
                'name' => 'ROUTER TP-LINK WR841N',
                'price' => 28,
                'description' => 'Router TP-Link WR841N, ofrece una conexión confiable y rápida en redes domésticas.',
                'brand_id' => 1,
                'categories' => [1, 7],
            ],
            [//33
                'name' => 'ROUTER TP-LINK ARCHER C54',
                'price' => 45,
                'description' => 'Router TP-Link Archer C54, diseñado para conexiones rápidas y estables con tecnología AC1200.',
                'brand_id' => 1,
                'categories' => [1, 7],
            ],
            [//34
                'name' => 'ROUTER TP-LINK TL-WR820N',
                'price' => 25,
                'description' => 'Router TP-Link TL-WR820N, una opción económica y eficiente para ampliar tu red WiFi.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//35
                'name' => 'ROUTER TP-LINK TL-WR840N',
                'price' => 26,
                'description' => 'Router TP-Link TL-WR840N, proporciona una conectividad estable y segura para tu hogar.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//36
                'name' => 'TP-LINK ROUTER TL-WR840N',
                'price' => 23,
                'description' => 'Router TP-Link TL-WR840N, compacto y fácil de usar, ideal para redes domésticas.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//37
                'name' => 'TP LINK TL-WR841HP',
                'price' => 60,
                'description' => 'Router TP-Link TL-WR841HP con alta potencia de señal, diseñado para proporcionar una cobertura WiFi extendida en grandes áreas.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//38
                'name' => 'TP LINK TL-WR850N',
                'price' => 22.47,
                'description' => 'Router TP-Link TL-WR850N, una solución económica y confiable para expandir la red WiFi en tu hogar.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//39
                'name' => 'TP LINK GPON ROUTER GB VOIP XN020-G3',
                'price' => 38,
                'description' => 'Router TP-Link GPON GB VoIP XN020-G3, con soporte para VoIP y puertos Gigabit, ideal para aplicaciones de red avanzadas.',
                'brand_id' => 1,
                'categories' => [1],
            ],
            [//40
                'name' => 'TP LINK ARCHER A7',
                'price' => 79,
                'description' => 'Router TP-Link Archer A7, con tecnología AC1750 para una conectividad rápida y eficiente en hogares con múltiples dispositivos.',
                'brand_id' => 1,
                'categories' => [1],
            ],
        ]);

        for($i = 0; $i < count($products); $i++){
            $j = $i + 1;
            $product = new Product();
            $product->price = $products[$i]['price'];
            $product->name = $products[$i]['name'];
            $product->brand_id = $products[$i]['brand_id'];
            $product->description = $products[$i]['description'];
            $product->slug = Str::slug($products[$i]['name']);
            $product->save();

            $product->images()->attach($j);
            $product->categories()->attach($products[$i]['categories']);
    
            // Actualizar el slug con el ID
            $product->slug = $product->slug . '-' . $product->id;
            $product->save();    
        }
    }
}
